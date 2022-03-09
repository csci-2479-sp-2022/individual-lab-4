# Lab Four

## Context
You may be familiar with creating databases and data/model layers in applications, but perhaps have used a more manual approach. For instance, in 2412 we created a database using an SQL file, and did CRUD operations in PHP by writing raw SQL strings within our PHP code. This is a "quick and dirty" method that can work in a pinch, but it's not great for scaling larger applications with more complex business logic, and is prone to errors.

This lab will give you some experience creating a data layer using a code-first approach thanks to Laravel's built-in migration features and Eloquent object-relational model (ORM). The migrations will allow us to maintain our database schema as it changes over time, and the ORM will allow us to use PHP methods to access our data records, without worrying too much about the SQL queries being executed under the hood.

## Standard local setup
1. open an Ubuntu terminal
   1. make sure you're in your home directory, where you've hopefully already created a projects folder: `cd ~/projects`
   2. make sure you have docker desktop running
2. clone this repo: `git clone git@github.com:csci-2479-sp-2022/individual-lab-4.git`
3. go into the project: `cd individual-lab-4`
4. copy the `.env.example` file to `.env`
5. run the following docker command to install our Sail dependencies:
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
6. start up the app: `./vendor/bin/sail up -d`
7. create app key: `./vendor/bin/sail artisan key:generate`
8. run database migrations: `./vendor/bin/sail artisan migrate`
9. XDebug helper extension for Firefox/chrome (to avoid editing our Dockerfile):
   - https://github.com/mac-cain13/xdebug-helper-for-chrome
   - https://github.com/BrianGilbert/xdebug-helper-for-firefox

## Running migrations
Be aware that you can always run `sail artisan migrate:fresh --seed` to start over from scratch with your tables and seeders. This command drops all tables and runs all migrations starting from the oldest timestamp in the migration file names.

Also know that running `sail artisan migrate` will run any new migrations in your project that have not been ran on your database.

## Lab Instruction Steps
1. Verify you can run the project on localhost
2. Create models for Video Games, Systems, Categories with migrations, seeders, factories, controllers
   - `sail artisan make:model System -mfsc`
   - repeat for Category, VideoGame
3. Add table colums in the respective migration file (the tables are already there):
   1. System:
      - `$table->string('name');`
      - `$table->string('code', 4);`
   2. Category
      - `$table->string('name');`
      - `$table->string('code', 4);`
   3. VideoGame
      - `$table->string('title');`
      - `$table->year('release_year');`
      - `$table->boolean('completed')->default(false);`
      - `$table->foreignId('system_id')->constrained()` which is a foreign key to the systems table
      - we'll also need to add a separate `category_video_game` table in this migration with `video_game_id` and `category_id` foreign key constraints (same syntax as above), as well as a composite primary key: `$table->primary(['category_id', 'video_game_id']);`
4. Run your migrations and verify they are successful (connect to your database via Workbench to see your tables)
   - `sail artisan migrate`
   - you should see the following tables (among a few others): categories, category_video_game, systems, video_games
5. Setup your [model relationships](https://laravel.com/docs/9.x/eloquent-relationships#defining-relationships):
   1. On the VideoGame and System models, add a one-to-many relationship
      - on VideoGame, add:
      ```
        public function sytem()
        {
            return $this->belongsTo(System::class);
        }
      ```
      - on System, add:
      ```
        public function videoGames()
        {
            return $this->hasMany(VideoGame::class);
        }
      ```
    2. On the VideoGame and Category models, add a many-to-many relationship
       - on VideoGame, add:
      ```
        public function categories()
        {
            return $this->belongsToMany(Category::class);
        }
      ```
      - on Category, add:
      ```
        public function videoGames()
        {
            return $this->hasMany(VideoGame::class);
        }
      ```
    3. Add an [accessor attribute](https://laravel.com/docs/9.x/eloquent-mutators#defining-an-accessor) and a helper function to VideoGame to assist with rendering our data
       - on VideoGame, add:
       ```
        // this accessor will render the boolean value as a yes/no string in our html table
        public function completedYesNo(): Attribute
        {
            return Attribute::make(
                get: fn($value, $attributes) => $attributes['completed'] ? 'Yes' : 'No'
            );
        }

        // this function will render the categories for each game as a comma-separated list
        public function categoryList(): string
        {
            $catList = [];

            foreach ($this->categories as $category) {
                array_push($catList, $category['name']);
            }

            return implode(', ', $catList);
        }
       ```
6. Use the seeders to populate some data:
   1. Add the model seeders we generated to the main DatabaseSeeder:
   ```
    public function run()
    {
        $this->call([
            SystemSeeder::class,
            CategorySeeder::class,
            VideoGameSeeder::class,
        ]);
    }
   ```
   2. Add some categories to the CategorySeeder (use the following code to create Adventure, Roleplaying, Strategy, Puzzle, etc):
   ```
    $factory = Category::factory();
    $factory->create([
        'name' => 'Action',
        'code' => 'ACT',
    ]);
   ```
   3. Add some systems to the SystemSeeder in a similar way (Super Nintendo, Sega Genesis, Playstation, etc)
   4. In the VideoGameSeeder, add some games with relationships to system/categories:
      1. Get the system you want to use:
      ```
        $nes = System::where('code', 'NES')->first();
      ```
      2. Get some categories to use:
      ```
        $platformer = Category::where('code', 'PLT')->first();
        $adventure = Category::where('code', 'ADV')->first();
      ```
      3. Create some games attached to the system record:
      ```
        $nes->videoGames()->createMany([
            [
                'title' => 'Super Mario Bros',
                'release_year' => '1985',
                'completed' => true,
            ],
            // could add additional games here
        ]);
      ```
      4. Get the game just created so we can attach categories to it
      ```
        $mario = VideoGame::where('title', 'Super Mario Bros')->first();
        $mario->categories()->attach([
            $platformer->id,
            $adventure->id,
        ]);
      ```
   5. Add a view to display the game list
      - Create `resources/views/video-games.blade.php`, and assuming you have a valid html5 doc, in the body add:
      ```
        <table>
            <tr>
                <th>Title</th>
                <th>System</th>
                <th>Release year</th>
                <th>Completed</th>
                <th>Categories</th>
            </tr>
            @foreach($games as $game)
            <tr>
                <td>{{$game->title}}</td>
                <td>{{$game->system->name}}</td>
                <td>{{$game->release_year}}</td>
                <td>{{$game->completed_yes_no}}</td>
                <td>{{$game->categoryList()}}</td>
            </tr>
            @endforeach
        </table>
      ```
      - notice how we're calling the accessor attribute `completed_yes_no` and the helper function `categoryList()`
   6. Add some logic in the VideoGameController to render the view with games from the database (Yes, we are being lazy in this lab and not doing this in a service layer)
   ```
    public function show()
    {
        return view('video-games', [
            'games' => self::getGames(),
        ]);
    }

    private static function getGames()
    {
        return VideoGame::with(['system', 'categories'])->get();
    }
   ```
   7. Add a route to GET /video-games
   ```
    Route::get('/video-games', [VideoGameController::class, 'show']);
   ```
   8. View your handiwork in a browser
10. Commit your work to your branch and submit a pull request
    - assign Andrew as the reviewer
