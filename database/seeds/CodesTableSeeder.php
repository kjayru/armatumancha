<?php

use Illuminate\Database\Seeder;
use App\Code;
class CodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rand = range(1, 999999);
            shuffle($rand);
            foreach ($rand as $val) {
                    switch (strlen($val)) {
                        case 1:

                            $gencode = "MA 00000".$val;
                        break;
                        case 2:
                            $gencode = "MA 0000".$val;
                        break;
                        case 3:
                            $gencode = "MA 000".$val;
                        break;
                        case 4:
                            $gencode = "MA 00".$val;
                        break;
                        case 5:
                            $gencode = "MA 0".$val;
                        break;
                        default;
                        $gencode = "MA ".$val;
                        break;
                    }

                Code::create([
                    'code' => $gencode,
                ]);
            }

    }
}
