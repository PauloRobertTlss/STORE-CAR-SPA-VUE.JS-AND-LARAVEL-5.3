<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repository = app(StoreTI\Repositories\Interfaces\ProductRepository::class);
        $categoryRepository = app(StoreTI\Repositories\Interfaces\CategoryRepository::class);

        foreach ($this->getData() as $m) {
            $tags = $m['tags'];
            $categs = $m['categories'];
            $m = array_except($m,'tags');
            $m = array_except($m,'categories');

                if(!isset($m['image_path'])){
                    $i = rand(1, 10);
                    $m['image_path'] = "https://s3.us-east-2.amazonaws.com/eaadk4yfoubad0tmoq3cert/notebooks/not$i.png";
                }

            $prod = $repository->skipPresenter()->create($m);

            foreach ($tags as $t){
                $prod->tags()->create($t);
            }
            unset($tags);

            foreach ($categs as $c){
                $prod->categories()->attach($c['category_id']);
            }
            unset($categs);
        }
    }


    private function getData(){
        return [
            ['name'=>'ASUS  1015CX ATOM N2600 1 GB 10.1"','description'=>'Card Reader,WIFI HDD 320 GB operacional DOS','price'=>15000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> '1GB']
            ]],
            ['name'=>'ASUS R051cx ATOM N2600 1 GB 10.1"','description'=>'Bluetooth ,WIFI,HDMI HDD 320 GB operacional WIN 7','price'=>16700,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> '1GB'],
                ['title'=> 'Bluetooth']
            ]],
            ['name'=>'ACER A0D270 ATOM N2600 2 GB 10.1"','description'=>'Bluetooth ,WIFI,HDMI HDD 320 GB operacional DOS','price'=>16300,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> '2GB']
            ]],
            ['name'=>'ACER A0D270 ATOM N2600 2 GB 10.1"','description'=>'Bluetooth ,WIFI,HDMI HDD 320 GB operacional WIN 7','price'=>17500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> '2GB']
            ]],
            ['name'=>'SONY YB35 AMD 350 2 GB 11.6"','description'=>'Bluetooth ,WIFI,HDMI HDD 320 GB operacional WIN 7','price'=>26900,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> '2GB']
            ]],
            ['name'=>'ASUS X53U Dual Core AMD (C60) 2 GB 15,6','description'=>'Wifi/BT/CAM/HDMI HDD 320 GB operacional DOS','price'=>20000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> 'HDMI'],
                ['title'=> '2GB']
            ]],
            ['name'=>'ASUS X44H-UX148D Dual Core (B960) 2GB 14.1"','description'=>'Cam,Wifi/USB3/HDMI HDD 500 operacional DOS','price'=>21500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Camera'],
                ['title'=> 'HDMI'],
                ['title'=> '2GB'],
                ['title'=> 'USB3'],
            ]],
            ['name'=>'ASUS X53E-SX1556D DUAL CORE (B815) 2 GB  15,6','description'=>'Cam,Wifi/USB3/HDMI HDD 320 operacional DOS','price'=>21000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Camera'],
                ['title'=> 'HDMI'],
                ['title'=> '2GB']
            ]],
            ['name'=>'ASUS X44H CORE i3 2 GB 14.1"','description'=>'Cam,Wifi/USB3/HDMI HDD 500 GB operacional DOS','price'=>27700,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'i3'],
                ['title'=> 'Camera'],
                ['title'=> 'HDMI'],
                ['title'=> '2GB']
            ]],
            ['name'=>'ASUS K53SM-SX010D Core i5 4 GB 15.6"','description'=>'BT/Wf/WC/CR/2GB GT 630 HDD 750 GB operacional DOS','price'=>40500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Placa Video']


            ]],
            ['name'=>'ASUS K53SD CORE i3 4 GB 15.6"','description'=>'BT/Wf/WC/CR/2GB GT 610 HDD 500 GB operacional DOS','price'=>34500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i3'],
                ['title'=> 'Placa Video']

            ]],
            ['name'=>'ASUS K55VM CORE i7 8 GB 15.6"','description'=>'BT/Wf/WC/CR/2GB GT 630 HDD 1 TB operacional DOS','price'=>52500,'categories'=>[['category_id'=>1],['category_id'=>14]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '8GB'],
                ['title'=> 'i7'],
                ['title'=> 'Placa Video']
            ]],
            ['name'=>'SONY VAIO E14111/E15111 B Pentium B970 2 GB 14"/15.5" HD','description'=>'BT/Wf/WC/CR HDD 320 GB operacional Win 7HB','price'=>28200,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'Pentium'],
            ]],
            ['name'=>'SONY VAIO E14112/E1511A B/W Core i3 2.40/Core i3 2.2 2 GB 14"/15.5" HD','description'=>'BT/Wf/WC/CR HDD 320 GB operacional Win 7HB','price'=>30100,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'SONY VAIO E15115 B/W Core i3 2.40 4 GB 15.5" HD','description'=>'BT/Wf/WC/CR/1GB Radeon HDD 500 GB operacional Win 7HB','price'=>37900,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i3'],
                ['title'=> 'Placa Video']
            ]],
            ['name'=>'SONY VAIO E14113/E15116 B/W Core i5 2.50 4 GB 14"/15.5" HD','description'=>'BT/Wf/WC/CR/1GB Radeon HDD 500 GB operacional Win 7HB','price'=>43700,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Placa Video']
            ]],
            ['name'=>'SONY VAIO E14116 B 3rd Gen Core i5 2.60 4 GB 14" HD','description'=>'BT/Wf/WC/CR HDD 500 GB operacional Win 7Pro','price'=>47600,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5']
            ]],
            ['name'=>'SONY VAIO E15117 B/W/P Core i5 2.50 4 GB 15.5" HD','description'=>'BT/Wf/WC/CR/2GB Radeon HDD 640 GB operacional Win 7HP','price'=>47600,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Placa Video']
            ]],
            ['name'=>'SONY VAIO E15118 B/W 3rd Gen Core i7 2.10 4 GB 15.5" HD','description'=>'BT/Wf/WC/CR/2GB Radeon HDD 750 GB operacional Win 7HP','price'=>56300,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i7'],
                ['title'=> 'Placa Video']
            ]],
            ['name'=>'SONY VAIO E14A15 B/S/P/S/G Core i5 2.50 4 GB 14.1" HD','description'=>'BT/Wf/HDWC/CR/1gb/BacklitKB HDD 640 GB operacional Win 7HP','price'=>54400,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5']
            ]],
            ['name'=>'SONY VAIO E14A16 S/G 3rd Gen Core i7 2.10 4 GB 14.1" HD','description'=>'BT/Wf/HDWC/CR/1gb/BacklitKB HDD 750 GB operacional Win 7HP','price'=>64000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i7'],
                ['title'=> 'Placa Video']
            ]],
            ['name'=>'SONY VAIO SVS13115 B/S  3rd Gen Core i5 2.50 4 GB 13.3" HD','description'=>'BT/Wf/WC/CR/BacklitKB/1.72kg HDD 640 GB operacional Win 7Pro','price'=>63000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Placa Video']
            ]],
            ['name'=>'SONY VAIO SVS13112 B/S 3rd Gen Core i5 2.50 4 GB 13.3" HD','description'=>'BT/Wf/WC/CR/BacklitKB/1.72kg HDD 500 GB operacional Win 7HB','price'=>53400,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Placa Video']
            ]],
            ['name'=>'SONY VAIO SVT11113 Ultrabook 3rd Gen Core i5  4 GB 11.6" HD','description'=>'BT/Wf/WC/CR HDD 500GB+32GB operacional Win 7HP','price'=>48500,'categories'=>[['category_id'=>6]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Ultrabook'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'M12'],
                ['title'=> 'SATA']

            ]],
            ['name'=>'SONY VAIO SVT13113 Ultrabook Core i3 1.40 4 GB 13.3" HD','description'=>'BT/Wf/WC/CR HDD 500 GB operacional Win 7HB','price'=>78390,'categories'=>[['category_id'=>6]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> 'Ultrabook'],
                ['title'=> '4GB'],
                ['title'=> 'i3'],
            ]],
            ['name'=>'SONY VAIO SVS15115 B 3rd Gen Core i5 2.50 4 GB 15.5"FULL HD','description'=>'BT/Wf/Wf/CR/2gb640/BcklitKB HDD 640 GB operacional Win 7HP','price'=>67890,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Full HD']
            ]],
            ['name'=>'SONY VAIO SVS15116 B 3rd Gen Core i7 2.10 4 GB 15.5"FULL HD','description'=>'BT/Wf/Wf/CR/2gb640/BcklitKB HDD 750 GB operacional Win 7HP','price'=>77600,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i7'],
                ['title'=> 'Full HD']
            ]],
            ['name'=>'DELL XPS 15 Core i5 4 GB 15.6"','description'=>'BT/Wifi/1 GB ATI HDD 500 GB operacional Win 7','price'=>43500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Placa de Video']

            ]],
            ['name'=>'DELL INSP 14 corei3  2 GB 14.1"','description'=>'BT/WIFI/WC/CR HDD 500 GB operacional DOS','price'=>30750,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'DELL INSP 14 CORE I3  2 GB 15.6"','description'=>'BT/WIFI/WC/CR HDD 500 GB operacional DOS','price'=>31500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3'],
            ]],
            ['name'=>'DELL INSP 15 CORE I3  2GB 14.1"','description'=>'BT/WIFI/WC/CR HDD 500 GB operacional Win7','price'=>34500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'DELL XPS 15 Core i7 2nd Gen 4 GB 15.6"','description'=>'BT/Wifi/1GB ATI HDD 500 GB operacional Win 7','price'=>54500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i7'],
                ['title'=> 'Placa de Video']
            ]],
            ['name'=>'ACER Aspire E1-571 Dual Core  / CORE I3 2 GB 15.6"/14"','description'=>'Wifi/Cam/ HDD 500 GB operacional DOS','price'=>21500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'Dual Core']
            ]],
            ['name'=>'ACER Aspire V5-431 Dual Core 3rd Gen 2 GB 14"','description'=>'CAM/BT/WIFI 2KG HDD 500 GB operacional DOS','price'=>28500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> '2 KG']
            ]],
            ['name'=>'ACER Aspire 4752 Core i3 2nd Gen 2 GB 14.1"','description'=>'Wifi/Cam/BT HDD 500 GB operacional  WIN 7','price'=>28000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'ACER Aspire V5 - 571G  Core i3 2nd Gen 4 GB  15.6"','description'=>'BT/Wif/Cam HDD 500 GB operacional DOS','price'=>30000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'ACER Aspire V3 - 571 G Core i5 2nd Gen 4 GB 15.6"','description'=>'BT/Wifi/Cam/2 GB NVDA HDD 500 GB operacional WIN 7 HB','price'=>43000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Placa de video']
            ]],
            ['name'=>'ACER Aspire M3 - 581 TG Core i5 2nd Gen 4 GB 15.6"','description'=>' 20 GB SSD /8 Hours/1 GB NVDA HDD 500 GB operacional WIN 7 HB','price'=>52000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'SSD'],
                ['title'=> 'Placa de Video']
            ]],
            ['name'=>'ACER Aspire S3 CORE i5 3317U(3 RD GEN) 4 GB 13.3"','description'=>'20 GB SSD/6.5 Hours/Cam/B T HDD 500 GB operacional WIN 7 HB','price'=>53500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'SSD']
            ]],
            ['name'=>'COMPAQ CQ57 Dual Core 2 GB 15.6"','description'=>'BT/Wifi/CAM HDD 320 GB operacional DOS','price'=>20500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'Dual Core'],
            ]],
            ['name'=>'HP  Gseries G6 2132 TX Core i3 2 GB 15.6"','description'=>'BT/Wifi/CAM/1GB DEDI HDD 500 GB operacional DOS','price'=>32650,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3'],
                ['title'=> 'Dedicada']
            ]],
            ['name'=>'HP  Gseries G6 2005 AX AMD QUADCORE A8 4GB 15.6"','description'=>'CAM, BT ,Wifi/1GB HDD 500 GB operacional Win7HB','price'=>33950,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'QUADCORE'],
            ]],
            ['name'=>'HP  Gseries G6 1318 AX AMD A4 2 GB 15.6"','description'=>'CAM, BT/WIFI HDD 320 GB operacional DOS','price'=>23500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'AMD'],
            ]],
            ['name'=>'HP  Gseries 2000-2116 TU  CORE i5  3RD 2 GB 15.6"','description'=>'CAM, BT,1GB  HDD 500 GB operacional DOS','price'=>35500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i5']
            ]],
            ['name'=>'HP  Gseries 2000-2120 TU CORE i3  2 GB 15.6"','description'=>'CAM, BT,WIFI HDD 500 GB operacional DOS','price'=>27000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'SSD']
            ]],
            ['name'=>'SAMSUNG  NP 300E5C-A05IN Dual Core  (1.60GHz) 2 GB 15.6"','description'=>'Cam, BT , Grey Black HDD 320 GB operacional WIN 7','price'=>22000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'Dual Core'],
                ['title'=> 'Preto']
            ]],
            ['name'=>'SAMSUNG NP300E5Z-AOUIN Core i3 2 GB 15,6','description'=>', BT, Cam, Grey Black HDD 500GB operacional DOS','price'=>27750,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3'],
                ['title'=> 'Preto']
            ]],
            ['name'=>'SAMSUNG NP300E5Z-SOAIN Core i3 3rd Gen 4 GB 15.6"','description'=>'1Gb GrCam, BT , Sliver Black HDD 750 GB operacional DOS','price'=>32500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i3'],
                ['title'=> 'Cinza']
            ]],
            ['name'=>'SAMSUNG  NP300 E5X- A01IN Core i5 3rd Gen 4 GB 15.6"','description'=>'Cam, BT , Grey Black HDD 500 GB operacional DOS','price'=>34000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Cinza']
            ]],
            ['name'=>'SAMSUNG NP 300 E5X SO1IN 3rd genCore i5 4GB 15.6"','description'=>'1GB GR , BT, Cam, Grey Black HDD 750 GB operacional DOS','price'=>38500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Preto']
            ]],
            ['name'=>'SAMSUNG NP300V5A-SOCIN Core i7 6 GB 15.6"','description'=>'1GB GR , BT, Cam, Grey Black HDD 1 TB operacional WIN7HP','price'=>47500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> '1TB'],
                ['title'=> 'Preto']
            ]],
            ['name'=>'SAMSUNG NP 550 P5C S02 core i7 3rd gen  8 GB 15,6','description'=>'2GB GR , BT, Cam, Grey Black(Blue Ray) HDD 1 TB operacional WIN7HP','price'=>59500,'categories'=>[['category_id'=>1],['category_id'=>14]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '8GB'],
                ['title'=> 'i7'],
                ['title'=> '1TB'],
                ['title'=> 'Preto']
            ]],
            ['name'=>'LENOVO G 480 2197 B 950 2 GB 8XDvdrw','description'=>'BT,CAM,WIFI,CR HDD 320 GB operacional DOS','price'=>23200,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB']
            ]],
            ['name'=>'LENOVO G 570 0549 Core i3 2.4 ghz 2GB 8XDvdrw','description'=>'BT,CAM,WIFI,CR HDD 320 GB operacional DOS','price'=>28000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'LENOVO G 480 7419 Core i3 2.4 ghz 2GB 8XDvdrw','description'=>'BT,CAM,WIFI,CR HDD 320 GB operacional DOS','price'=>28900,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3'],
            ]],
            ['name'=>'LENOVO G 580 8022 Corei3 3rd Gen 4 GB 8XDvdrw','description'=>'BT,CAM,WIFI,CR,1GB HDD 500 GB operacional DOS','price'=>34500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'LENOVO G 580 4064 Core i5 3rd Gen 4 GB 8XDvdrw','description'=>'BT,CAM,WIFI,CR HDD 500 GB operacional DOS','price'=>34500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5']
            ]],
            ['name'=>'LENOVO Z 580 3345 Core i5 3rd Gen 4 GB 8xDvdrw','description'=>'BT,CAM,WIFI,CR,1GB,3yr HDD 500 GB operacional Win 7HB','price'=>45750,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5']
            ]],
            ['name'=>'LENOVO G 580 7036 Core i3 2.4 ghz 2 GB 8xDvdrw','description'=>'BT,CAM,WIFI,CR,1GB HDD 500 GB operacional DOS','price'=>32000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'LENOVO S 300 0450 Sleekbook Core i3 2nd Gen 2 GB NA','description'=>'BT,CAM,WIFI,CR HDD 500 GB operacional DOS','price'=>31750,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'LENOVO S 400 0453 Sleekbook Core i3 2nd Gen 2 GB NA','description'=>'BT,CAM,WIFI,CR,1GB HDD 500 GB operacional DOS','price'=>33750,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'SSD'],
                ['title'=> 'Placa de Video']
            ]],
            ['name'=>'LENOVO U410 2777 Ultrabook Core i5 3rd Gen 4 GB NA','description'=>'BT,WIFI,WB,CR,6 Hrs,3yr HDD 500+32 GB operacional Win 7 HB','price'=>54500,'categories'=>[['category_id'=>6]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'SSD'],
                ['title'=> 'M12'],
                ['title'=> 'Placa de Video'],
                ['title'=> 'ultrabook']
            ]],
            ['name'=>'TOSHIBA C 850-P5010 Dual Core B950 2 GB 15,6','description'=>'Wifi/BT/CAM HDD 320 GB operacional DOS','price'=>21500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'Dual Core']
            ]],
            ['name'=>'TOSHIBA L740-P4010 Dual Core B950 2GB 14.1"','description'=>'Cam,Wifi HDD 320 GB operacional DOS','price'=>22500,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'Dual Core']
            ]],
            ['name'=>'TOSHIBA M 840-i4010 Core i3 2 GB  14.1"','description'=>'2 kg/ Wifi/Cam/BT HDD 500 GB operacional DOS','price'=>31000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'DOS'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '2GB'],
                ['title'=> 'i3']
            ]],
            ['name'=>'TOSHIBA M 840-X4210 Core i5 4 GB 14.1"','description'=>'2 kg/ Wifi/cam/BT HDD 500 GB operacional Win 7 HB','price'=>41000,'categories'=>[['category_id'=>1]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5']
            ]],
            ['name'=>'TOSHIBA L750-X5318 Core i5 4 GB 15.6"','description'=>'i5 /1 GB NVIDIA Dedicated HDD 640 GB operacional Win 7 Prem','price'=>43500,'categories'=>[['category_id'=>1],['category_id'=>14]],'tags'=>[
                ['title'=> 'WIN 7'],
                ['title'=> 'Bluetooth'],
                ['title'=> 'Camera'],
                ['title'=> '4GB'],
                ['title'=> 'i5'],
                ['title'=> 'Placa de Video'],
                ['title'=> 'Dedicada']
            ]],

        ];
    }

    private function getCategories()
    {
        /**@var \StoreTI\Repositories\Interfaces\CategoryRepository $repository **/
        $repository = app(\StoreTI\Repositories\Interfaces\CategoryRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}
