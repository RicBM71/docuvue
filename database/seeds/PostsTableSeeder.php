<?php


use App\Categoria;
use App\Post;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Post::truncate();
    	//Categoria::truncate();

 		$faker = Faker::create();

 		for ($i=0; $i < 10; $i++) { 

 			$post = new Post;
	        $post->titulo = $faker->sentence();
	        $post->extracto = $faker->sentence();
	        $post->cuerpo = $faker->paragraph();
	        $post->fecha_publi = $faker->dateTime();
	      //  $post->categoria_id = $faker->randomDigitNotNull();
	        $post->save();
	    }

	    // for ($i=1; $i <= 10; $i++) { 
	    // 	$categoria = new Categoria;
	    // 	$categoria->nombre = "Categoria ".$i;
	    // 	$categoria->save();
	    // }

			// DB::table('posts')->insert([
		 //            'title' => $faker->sentence(),
		 //            'excerpt' =>  $faker->sentence(),
		 //            'body' =>  $faker->paragraph(),
		 //            'published_at' => $faker->dateTime(),
		 //            'categoria_id' => randomDigit()
		 //        ]);
		

    }
}
