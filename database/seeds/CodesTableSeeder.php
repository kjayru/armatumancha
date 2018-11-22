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

                            $gencode = "0000".$val;
                        break;
                        case 2:
                            $gencode = "000".$val;
                        break;
                        case 3:
                            $gencode = "00".$val;
                        break;
                        case 4:
                            $gencode = "0".$val;
                        break;
                        default;
                        $gencode = $val;
                        break;
                    }

                Code::create([
                    'code' => $gencode,
                ]);
            }

    }
}
