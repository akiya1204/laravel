<?php

use Illuminate\Database\Seeder;

class ItemtableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'item_id' => 1,
                'item_name' => 'PS4',
                'detail' => 'ネットワーク機能を強化しており、プレイ動画を公開したり、フレンド間でゲームプレイ中継を行うといった「シェア」機能を搭載し、PS Vitaなどとの「リモートプレイ」や、スリープ状態時のアップデーターやゲームデータの自動ダウンロードにシステムレベルで対応するゲーム機',
                'price' => 40000,
                'image' => 'ps4.jpg',
                'ctg_id' => 1,
            ],
            [
                'item_id' => 2,
                'item_name' => 'Wii',
                'detail' => '道具に見立てて振ったり、画面を指し示したりといった動作による、直感的なゲームを操作を可能としたゲーム機',
                'price' => 20000,
                'image' => 'wii.jpg',
                'ctg_id' => 1,
            ],
            [
                'item_id' => 3,
                'item_name' => 'switch',
                'detail' => '「Nintendo Switch」は、さまざまなプレイシーンにあわせてカタチを変えるゲーム機。 いつでも、どこでも、気の向くままに。自由なプレイスタイルでゲームを楽しむことができます。',
                'price' => 35000,
                'image' => 'switch.jpg',
                'ctg_id' => 1,
            ],
            [
                'item_id' => 4,
                'item_name' => 'Xbox',
                'detail' => 'Microsoftのコンピュータゲームのブランド。Microsoftが開発した第6世代から第8世代までの家庭用ゲーム機がこのブランドの代表',
                'price' => 25000,
                'image' => 'xbox.jpg',
                'ctg_id' => 1,
            ],
            [
                'item_id' => 5,
                'item_name' => 'ストリートファイター',
                'detail' => '「ストリートファイター」は、カプコンが1987年に開発・稼動した2D対戦型格闘ゲーム',
                'price' => 5000,
                'image' => 'street.jpg',
                'ctg_id' => 2,
            ],
            [
                'item_id' => 6,
                'item_name' => 'RAINBOWSIX SIEGE',
                'detail' => 'ビデオゲーム作品『レインボーシックス』（Rainbow Six）シリーズ通算5作目の最新作。
                国境なき対テロ特殊部隊の戦い描くタクティカルFPS。
                レインボーシックスシリーズはタクティカルFPSに分類され、一発の弾と戦術がチームの勝敗を左右するリアル志向のFPSであり一般的なFPSと比べると難易度とハードルが高い。だがその分、仲間との連携が上手く行ったり、敵を掃討した時の達成感を味わう事が出来る。',
                'price' => 7000,
                'image' => 'fps.jpg',
                'ctg_id' => 2,
            ],
            [
                'item_id' => 7,
                'item_name' => 'SUPER MARIO BROS.Wii',
                'detail' => '任天堂が発売したファミリーコンピュータ用ゲームソフト。略称は「スーパーマリオ」「スーマリ」「マリオ」など。横スクロール型のアクションゲームで、プレイ人数は1 - 2名。',
                'price' => 2000,
                'image' => 'mario.jpg',
                'ctg_id' => 2,
            ],
            [
                'item_id' => 8,
                'item_name' => 'マインクラフト',
                'detail' => 'Minecraft（マインクラフト）は、マルクス・ペルソン（通称 Notch）と彼が設立した会社、Mojang ABの社員が開発したサンドボックスビデオゲームである。日本では「マイクラ」と略称され、サバイバル生活を楽しんだり、自由にブロックを配置し建築等を楽しむことができる。',
                'price' => 1700,
                'image' => 'mine.jpg',
                'ctg_id' => 2,
            ],
            [
                'item_id' => 9,
                'item_name' => 'PS4コントローラー',
                'detail' => 'PS4付属品のコントローラー',
                'price' => 3000,
                'image' => 'ps4_cont.jpg',
                'ctg_id' => 3,
            ],
            [
                'item_id' => 10,
                'item_name' => 'Wiiコントローラー',
                'detail' => 'Wii付属品のコントローラー',
                'price' => 1500,
                'image' => 'wii_cont.jpg',
                'ctg_id' => 3,
            ],
            [
                'item_id' => 11,
                'item_name' => 'switchコントローラー',
                'detail' => 'switch付属品のコントローラー',
                'price' => 2000,
                'image' => 'switch_cont.jpg',
                'ctg_id' => 3,
            ],
            [
                'item_id' => 12,
                'item_name' => 'Xboxコントローラー',
                'detail' => 'Xbox付属品のコントローラー',
                'price' => 1700,
                'image' => 'xbox_cont.jpg',
                'ctg_id' => 3,
            ],
        ]);
    }
}
