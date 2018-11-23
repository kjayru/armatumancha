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
        $rand = range(1, 99999);
            shuffle($rand);
            foreach ($rand as $val) {
                    switch (strlen($val)) {
                        case 1:

                            $gencode = "MN 0000".$val;
                        break;
                        case 2:
                            $gencode = "MN 000".$val;
                        break;
                        case 3:
                            $gencode = "MN 00".$val;
                        break;
                        case 4:
                            $gencode = "MN 0".$val;
                        break;
                        default;
                        $gencode = "MN ".$val;
                        break;
                    }

                Code::create([
                    'code' => $gencode,
                ]);
            }

    }
}
