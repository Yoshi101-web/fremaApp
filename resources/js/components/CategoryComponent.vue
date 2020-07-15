<template>
    <div class="container p-0">
        <ul  class="category-group">
        <!-- -カテゴリー親 - -->
            <li>
                <label for="category" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">カテゴリー</p>
                    <div class="require-content">
                        <p class="require font-weight-bold">必須</p>
                    </div>
                </label>
            </li>
        <!-- -カテゴリー親 - -->
            <li class="select-box">
                <select id="category" name="category_id" class="form-control" v-model="Category" @change="fetchChild">
                    <option value="">選択してください</option>
                    <option v-for="(category, index) in categories" :value="category.id" :key="index">
                        {{ category.name }}
                    </option>
                </select>
            </li>
        <!-- -カテゴリー子 - -->
            <li class="select-box">
                <select id="category" name="category_children_id" class="form-control" v-show="showChildren" v-model="CategoryChildren" @change="fetchGrandChild" placeholder="選択してください">
                    <option value="">選択してください</option>
                    <option v-for="(child, index) in children" v-bind:value="child.id" :key="index">
                        {{ child.name }}
                    </option>
                </select>
            </li>
        <!-- -カテゴリー孫 - -->
            <li class="select-box">
                <select id="category" name="category_grand_children_id" class="form-control" v-show="showGrandChildren"  v-model="CategoryGrandChildren">
                    <option value="">選択してください</option>
                    <option v-for="(grandChild, index) in grandChildren" v-bind:value="grandChild.id" :key="index">
                        {{ grandChild.name }}
                    </option>
                </select>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
        props: [
            'category_id',
            'category_children_id',
            'category_grand_children_id'
        ],
    data() {
        return {
            // category_id: this.old.category_id,
            // category_children_id: this.old.category_children_id,
            // category_grand_children_id: this.old.category_grand_children_id,
            showChildren: false,
            showGrandChildren: false,
            Category: '',
            CategoryChildren: '',
            CategoryGrandChildren: '',
            categories: [
                {id: 1, name: 'レディース'},
                {id: 2, name: 'メンズ'},
                {id: 3, name: 'ベビー・キッズ'},
                {id: 4, name: 'インテリア・住まい・小物'},
                {id: 5, name: '本・音楽・ゲーム'},
                {id: 6, name: 'おもちゃ・ホビー・グッズ'},
                {id: 7, name: 'コスメ・香水・美容'},
                {id: 8, name: '家電・スマホ・カメラ'},
                {id: 9, name: 'スポーツ・レジャー'},
                {id: 10, name: 'ハンドメイド'},
                {id: 11, name: 'チケット'},
                {id: 12, name: '自動車・オートバイ'},
                {id: 13, name: 'その他'},
            ],
            children: [],
            grandChildren: []
        }
    },
    methods: {
        fetchChild() {
            var tmp_children = [{name: '選択してください'}];
            if (this.Category == 1) { //レディース
                tmp_children = [
                {id: 101, name: 'トップス'},
                {id: 102, name: 'ジャケット/アウター'},
                {id: 103, name: 'パンツ'},
                {id: 104, name: 'スカート'},
                {id: 105, name: 'ワンピース'},
                {id: 106, name: '靴'},
                {id: 107, name: 'ルームウェア/パジャマ'},
                {id: 108, name: 'レッグエェア'},
                {id: 109, name: '帽子'},
                {id: 110, name: 'バッグ'},
                {id: 111, name: 'アクセサセリー'},
                {id: 112, name: 'ヘアアクセサリー'},
                {id: 113, name: '小物'},
                {id: 114, name: '時計'},
                {id: 115, name: 'ウィッグ/エステ'},
                {id: 116, name: '浴衣/水着'},
                {id: 117, name: 'スーツ/フォーマル/ドレス'},
                {id: 118, name: 'マタニティ'},
                {id: 119, name: 'その他'},
                ]
            } else if (this.Category == 2) { //メンズ
                tmp_children = [
                {id: 201, name: 'トップス'},
                {id: 202, name: 'ジャケット/アウター'},
                {id: 203, name: 'パンツ'},
                {id: 204, name: '靴'},
                {id: 205, name: 'バッグ'},
                {id: 206, name: 'スーツ'},
                {id: 207, name: '帽子'},
                {id: 208, name: 'アクセサリー'},
                {id: 209, name: '小物'},
                {id: 210, name: '時計'},
                {id: 211, name: '水着'},
                {id: 212, name: 'レッグウェア'},
                {id: 213, name: 'アンダーウェア'},
                {id: 214, name: 'その他'},
                ]
            } else if (this.Category == 3) { //ベビー・キッズ
                tmp_children = [
                {id: 301, name: 'ベビー服(男の子用)'},
                {id: 302, name: 'ベビー服(女の子用)'},
                {id: 303, name: '子ども用ファッション小物'},
                {id: 304, name: '外出/移動用品'},
                {id: 305, name: '授乳/食事'},
                {id: 306, name: 'ベビー家具/寝具/室内用品'},
                {id: 307, name: 'おもちゃ'},
                {id: 308, name: '行事/記念品'},
                {id: 309, name: 'その他'},
                ]
            }else if (this.Category == 4) { //インテリア・住まい・小物
                tmp_children = [
                {id: 401, name: 'キッチン/食器'},
                {id: 402, name: 'ベッド/マットレス'},
                {id: 403, name: 'ソファ/ソファベッド'},
                {id: 404, name: '椅子/チェア'},
                {id: 405, name: '机/テーブル'},
                {id: 406, name: '収納家具'},
                {id: 407, name: 'ラグ/カーペット/マット'},
                {id: 408, name: 'カーテン/ブラインド'},
                {id: 409, name: 'ライト/照明'},
                {id: 410, name: '寝具'},
                {id: 411, name: 'インテリア小物'},
                {id: 412, name: '季節/年中行事'},
                {id: 413, name: 'その他'},
                ]
            }else if (this.Category == 5) { //本・音楽・ゲーム
                tmp_children = [
                {id: 501, name: '本'},
                {id: 502, name: '漫画'},
                {id: 503, name: '雑誌'},
                {id: 504, name: 'CD'},
                {id: 505, name: 'DVD/ブルーレイ'},
                {id: 506, name: 'レコード'},
                {id: 507, name: 'テレビゲーム'},
                ]
            }else if (this.Category == 6) { //おもちゃ・ホビー・グッズ
                tmp_children = [
                {id: 601, name: 'おもちゃ'},
                {id: 602, name: 'タレントグッズ'},
                {id: 603, name: 'コミック/アニメグッズ'},
                {id: 604, name: 'トレーディングカード'},
                {id: 605, name: 'フィギュア'},
                {id: 606, name: '楽器/器材'},
                {id: 607, name: 'コレクション'},
                {id: 608, name: 'ミリタリー'},
                {id: 609, name: '美術品'},
                {id: 610, name: 'アート用品'},
                {id: 611, name: 'その他'},
                ]
            }else if (this.Category == 7) { //コスメ・香水・美容
                tmp_children = [
                {id: 701, name: 'ベースメイク'},
                {id: 702, name: 'メイクアップ'},
                {id: 703, name: 'ネイルケア'},
                {id: 704, name: '香水'},
                {id: 705, name: 'スキンケア/基礎化粧品'},
                {id: 706, name: 'ヘアケア'},
                {id: 707, name: 'ボディケア'},
                {id: 708, name: 'オーラルケア'},
                {id: 709, name: 'リラクゼーション'},
                {id: 710, name: 'ダイエット'},
                {id: 711, name: 'その他'},
                ]
            }else if (this.Category == 8) { //家電・スマホ・カメラ
                tmp_children = [
                {id: 801, name: 'スマートフォン/携帯電話'},
                {id: 802, name: 'スマホアクセサリー'},
                {id: 803, name: 'PC/タブレット'},
                {id: 804, name: 'カメラ'},
                {id: 805, name: 'テレビ/映像機器'},
                {id: 806, name: 'オーディオ機器'},
                {id: 807, name: '美容/健康'},
                {id: 808, name: '冷暖房/空調'},
                {id: 809, name: '生活家電'},
                {id: 810, name: 'その他'},
                ]
            }else if (this.Category == 9) { //スポーツ・レジャー
                tmp_children = [
                {id: 901, name: 'ゴルフ'},
                {id: 902, name: 'フィッシング'},
                {id: 903, name: '自転車'},
                {id: 904, name: 'トレーニング/エクササイズ'},
                {id: 905, name: '野球'},
                {id: 906, name: 'サッカー/フットサル'},
                {id: 907, name: 'テニス'},
                {id: 908, name: 'スノーボード'},
                {id: 909, name: 'スキー'},
                {id: 910, name: 'その他スポーツ'},
                {id: 911, name: 'アウトドア'},
                {id: 912, name: 'その他'},
                ]
            }else if (this.Category == 10) { //ハンドメイド
                tmp_children = [
                {id: 1001, name: 'アクセサリー(女性用)'},
                {id: 1002, name: 'ファッション/小物'},
                {id: 1003, name: 'アクセサリー/時計'},
                {id: 1004, name: '日用品/インテリア'},
                {id: 1005, name: '趣味/おもちゃ'},
                {id: 1006, name: 'キッズ/ベビー'},
                {id: 1007, name: '素材/材料'},
                {id: 1008, name: '二次創作物'},
                {id: 1009, name: 'その他'},
                {id: 1010, name: 'Events'},
                ]
            }else if (this.Category == 11) { //チケット
                tmp_children = [
                {id: 1101, name: '音楽'},
                {id: 1102, name: 'スポーツ'},
                {id: 1103, name: '演劇/芸能'},
                {id: 1104, name: 'イベント'},
                {id: 1105, name: '映画'},
                {id: 1106, name: '施設利用券'},
                {id: 1107, name: '優待券/割引券'},
                {id: 1108, name: 'その他'},
                ]
            }else if (this.Category == 12) { //自動車・オートバイ
                tmp_children = [
                {id: 1201, name: '自動車本体'},
                {id: 1202, name: '自動車タイヤ/ホイール'},
                {id: 1203, name: '自動車パーツ'},
                {id: 1204, name: '自動車アクセサリー'},
                {id: 1205, name: 'オートバイ車体'},
                {id: 1206, name: 'オートバイパーツ'},
                {id: 1207, name: 'オートバイアクセサリー'},
                ]
            }else if (this.Category == 13) { //その他
                tmp_children = [
                {id: 1301, name: 'ペット用品'},
                {id: 1302, name: '食品'},
                {id: 1303, name: '飲料/酒'},
                {id: 1304, name: '日用品/生活雑貨/旅行'},
                {id: 1305, name: 'アンティーク/コレクション'},
                {id: 1306, name: '文房具/事務用品'},
                {id: 1307, name: '事務/店舗用品'},
                {id: 1308, name: 'その他'},
                ]
            }else {
                alert('カテゴリーを選択してください')
            }
            
            this.children = tmp_children;
            this.CategoryGrandChildren = '';
            this.showChildren=true;
        },
        fetchGrandChild() {
            this.CategoryGrandChildren = '';
            var tmp_grandChildren = [];
            if (this.CategoryChildren == 101) { //レディース > トップス
                tmp_grandChildren = [
                {id: 10101, name: 'Tシャツ/カットソー(半袖/袖なし)'},
                {id: 10102, name: 'Tシャツ/カットソー(七分/長袖)'},
                {id: 10103, name: 'シャツ/ブラウス(半袖/袖なし)'},
                {id: 10104, name: 'シャツ/ブラウス(七分/長袖)'},
                {id: 10105, name: 'ポロシャツ'},
                {id: 10106, name: 'キャミソール'},
                {id: 10107, name: 'タンクトップ'},
                {id: 10108, name: 'ホルターネック'},
                {id: 10109, name: 'ニット/セーター'},
                {id: 10110, name: 'チュニック'},
                {id: 10111, name: 'カーディガン/ボレロ'},
                {id: 10112, name: 'アンサンブル'},
                {id: 10113, name: 'ベスト/ジレ'},
                {id: 10114, name: 'パーカー'},
                {id: 10115, name: 'トレーナー/スウェット'},
                {id: 10116, name: 'ベアトップ/チューブトップ'},
                {id: 10117, name: 'ジャージ'},
                {id: 10118, name: 'その他'}
                ]
            } else if (this.CategoryChildren == 102) { //レディース > ジャケット/アウター
                tmp_grandChildren = [
                {id: 10201, name: 'ノーカラージャケット'},
                {id: 10202, name: 'テーラードジャケット'},
                {id: 10203, name: 'ノーカラージャケット'},
                {id: 10204, name: 'Gジャン/デニムジャケット'},
                {id: 10205, name: 'レザージャケット'},
                {id: 10206, name: 'ダウンジャケット'},
                {id: 10207, name: 'ライダースジャケット'},
                {id: 10208, name: 'ミリタリージャケット'},
                {id: 10209, name: 'ダウンベスト'},
                {id: 10210, name: 'ポンチョ'},
                {id: 10211, name: 'ロングコート'},
                {id: 10212, name: 'トレンチコート'},
                {id: 10213, name: 'ダッフルコート'},
                {id: 10214, name: 'ピーコート'},
                {id: 10215, name: 'チェスターコート'},
                {id: 10216, name: 'モッズコート'},
                {id: 10217, name: 'スタジャン'},
                {id: 10218, name: '毛皮/ファーコート'},
                {id: 10219, name: 'スプリングコート'},
                {id: 10220, name: 'スカジャン'},
                {id: 10221, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 103) { //レディース > パンツ
                tmp_grandChildren = [
                {id: 10301, name: 'デニム/ジーンズ'},
                {id: 10302, name: 'ショートパンツ'},
                {id: 10303, name: 'カジュアルパンツ'},
                {id: 10304, name: 'ハーフパンツ'},
                {id: 10305, name: 'チノパン'},
                {id: 10306, name: 'ワークパンツ/カーゴパンツ'},
                {id: 10307, name: 'クロップドパンツ'},
                {id: 10308, name: 'サロペット/オーバーオール'},
                {id: 10309, name: 'オールインワン'},
                {id: 10310, name: 'サルエルパンツ'},
                {id: 10311, name: 'ガウチョパンツ'},
                {id: 10312, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 104) { //レディース > スカート
                tmp_grandChildren = [
                {id: 10401, name: 'ミニスカート'},
                {id: 10402, name: 'ひざ丈スカート'},
                {id: 10403, name: 'ロングスカート'},
                {id: 10404, name: 'キュロット'},
                {id: 10405, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 105) { //レディース > ワンピース
                tmp_grandChildren = [
                {id: 10501, name: 'ミニワンピース'},
                {id: 10502, name: 'ひざ丈ワンピース'},
                {id: 10503, name: 'ロングワンピース'},
                {id: 10504, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 106) { //レディース > 靴
                tmp_grandChildren = [
                {id: 10601, name: 'ハイヒール/パンプス'},
                {id: 10602, name: 'ブーツ'},
                {id: 10603, name: 'サンダル'},
                {id: 10604, name: 'スニーカー'},
                {id: 10605, name: 'ミュール'},
                {id: 10606, name: 'モカシン'},
                {id: 10607, name: 'ローファー/革靴'},
                {id: 10608, name: 'フラットシューズ/バレエシューズ'},
                {id: 10609, name: '長靴/レインシューズ'},
                {id: 10610, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 107) { //レディース > ルームウェア/パジャマ
                tmp_grandChildren = [
                {id: 10701, name: 'パジャマ'},
                {id: 10702, name: 'ルームウェア'},
                {id: 10703, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 108) { //レディース > レッグエェア
                tmp_grandChildren = [
                {id: 10801, name: 'ソックス'},
                {id: 10802, name: 'スパッツ/レギンス'},
                {id: 10803, name: 'ストッキング/タイツ'},
                {id: 10804, name: 'レッグウォーマー'},
                {id: 10805, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 109) { //レディース > 帽子
                tmp_grandChildren = [
                {id: 10901, name: 'ニットキャップ/ビーニー'},
                {id: 10902, name: 'ハット'},
                {id: 10903, name: 'ハンチング/ベレー帽'},
                {id: 10904, name: 'キャップ'},
                {id: 10905, name: 'キャスケット'},
                {id: 10906, name: '麦わら帽子'},
                {id: 10907, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 110) { //レディース > バッグ
                tmp_grandChildren = [
                {id: 11001, name: 'ハンドバッグ'},
                {id: 11002, name: 'トートバッグ'},
                {id: 11003, name: 'エコバッグ'},
                {id: 11004, name: 'リュック/バックパック'},
                {id: 11005, name: 'ボストンバッグ'},
                {id: 11006, name: 'スポーツバッグ'},
                {id: 11007, name: 'ショルダーバッグ'},
                {id: 11008, name: 'クラッチバッグ'},
                {id: 11009, name: 'ポーチ/バニティ'},
                {id: 11010, name: 'ボディバッグ/ウェストバッグ'},
                {id: 11011, name: 'マザーズバッグ'},
                {id: 11012, name: 'メッセンジャーバッグ'},
                {id: 11013, name: 'ビジネスバッグ'},
                {id: 11014, name: '旅行用バッグ/キャリーバッグ'},
                {id: 11015, name: 'ショップ袋'},
                {id: 11016, name: '和装用バッグ'},
                {id: 11017, name: 'かごバッグ'},
                {id: 11018, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 111) { //レディース > アクセサリー
                tmp_grandChildren = [
                {id: 11101, name: 'ネックレス'},
                {id: 11102, name: 'ブレスレット'},
                {id: 11103, name: 'バングル/リストバンド'},
                {id: 11104, name: 'リング'},
                {id: 11105, name: 'ピアス(片耳用)'},
                {id: 11106, name: 'ピアス(両耳用)'},
                {id: 11107, name: 'イヤリング'},
                {id: 11108, name: 'アンクレット'},
                {id: 11109, name: 'ブローチ/コサージュ'},
                {id: 11110, name: 'チャーム'},
                {id: 11111, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 112) { //レディース > ヘアアクセサリー
                tmp_grandChildren = [
                {id: 11201, name: 'ヘアゴム/シュシュ'},
                {id: 11202, name: 'ヘアバンド/カチューシャ'},
                {id: 11203, name: 'ヘアピン'},
                {id: 11204, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 113) { //レディース > 小物
                tmp_grandChildren = [
                {id: 11301, name: '長財布'},
                {id: 11302, name: '折り財布'},
                {id: 11303, name: 'コインケース/小銭入れ'},
                {id: 11304, name: '名刺入れ/定期入れ'},
                {id: 11305, name: 'キーケース'},
                {id: 11306, name: 'キーホルダー'},
                {id: 11307, name: '手袋/アームカバー'},
                {id: 11308, name: 'ハンカチ'},
                {id: 11309, name: 'ベルト'},
                {id: 11310, name: 'マフラー/ショール'},
                {id: 11311, name: 'ストール/スヌード'},
                {id: 11312, name: 'バンダナ/スカーフ'},
                {id: 11313, name: 'ネックウォーマー'},
                {id: 11314, name: 'サスペンダー'},
                {id: 11315, name: 'サングラス/メガネ'},
                {id: 11316, name: 'モバイルケース/カバー'},
                {id: 11317, name: '手帳'},
                {id: 11318, name: 'イヤマフラー'},
                {id: 11319, name: '傘'},
                {id: 11320, name: 'レインコート/ポンチョ'},
                {id: 11321, name: 'ミラー'},
                {id: 11322, name: 'タバコグッズ'},
                {id: 11323, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 114) { //レディース > 時計
                tmp_grandChildren = [
                {id: 11401, name: '腕時計(アナログ)'},
                {id: 11402, name: '腕時計(デジタル)'},
                {id: 11403, name: 'ラバーベルト'},
                {id: 11404, name: 'レザーベルト'},
                {id: 11405, name: '金属ベルト'},
                {id: 11406, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 115) { //レディース > ウィッグ/エステ
                tmp_grandChildren = [
                {id: 11501, name: '前髪ウィッグ'},
                {id: 11502, name: 'ロングストレート'},
                {id: 11503, name: 'ロングカール'},
                {id: 11504, name: 'ショートストレート'},
                {id: 11505, name: 'ショートカール'},
                {id: 11506, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 116) { //レディース > 浴衣/水着
                tmp_grandChildren = [
                {id: 11601, name: '浴衣'},
                {id: 11602, name: '着物'},
                {id: 11603, name: '振袖'},
                {id: 11604, name: '長襦袢/半襦袢'},
                {id: 11605, name: '水着セパレート'},
                {id: 11606, name: '水着ワンピース'},
                {id: 11607, name: '水着スポーツ用'},
                {id: 11608, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 117) { //レディース > スーツ/フォーマル/ドレス
                tmp_grandChildren = [
                {id: 11701, name: 'スカートスーツ上下'},
                {id: 11702, name: 'パンツスーツ上下'},
                {id: 11703, name: 'ドレス'},
                {id: 11704, name: 'パーティーバッグ'},
                {id: 11705, name: 'シューズ'},
                {id: 11706, name: 'ウェディング'},
                {id: 11707, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 118) { //レディース > マタニティ
                tmp_grandChildren = [
                {id: 11801, name: 'トップス'},
                {id: 11802, name: 'アウター'},
                {id: 11803, name: 'インナー'},
                {id: 11804, name: 'ワンピース'},
                {id: 11805, name: 'パンツ/スパッツ'},
                {id: 11806, name: 'スカート'},
                {id: 11807, name: 'パジャマ'},
                {id: 11808, name: '授乳服'},
                {id: 11809, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 119) { //レディース > その他
                tmp_grandChildren = [
                {id: 11901, name: 'コスプレ'},
                {id: 11902, name: '下着'},
                {id: 11903, name: 'その他'},
                ]

            //メンズ
            }else if (this.CategoryChildren == 201) { //メンズ > トップス
                tmp_grandChildren = [
                {id: 20101, name: 'Tシャツ/カットソー(半袖/袖なし)'},
                {id: 20102, name: 'Tシャツ/カットソー(七分/長袖)'},
                {id: 20103, name: 'シャツ'},
                {id: 20104, name: 'ポロシャツ'},
                {id: 20105, name: 'タンクトップ'},
                {id: 20106, name: 'ニット/セーター'},
                {id: 20107, name: 'パーカー'},
                {id: 20108, name: 'カーディガン'},
                {id: 20109, name: 'スウェット'},
                {id: 20110, name: 'トップス'},
                {id: 20111, name: 'ジャージ'},
                {id: 20112, name: 'ベスト'},
                {id: 20113, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 202) { //メンズ > ジャケット/アウター
                tmp_grandChildren = [
                {id: 20201, name: 'テーラードジャケット'},
                {id: 20202, name: 'ノーカラージャケット'},
                {id: 20203, name: 'Gジャン/デニムジャケット'},
                {id: 20204, name: 'レザージャケット'},
                {id: 20205, name: 'ダウンジャケット'},
                {id: 20206, name: 'ライダースジャケット'},
                {id: 20207, name: 'ミリタリージャケット'},
                {id: 20208, name: 'ナイロンジャケット'},
                {id: 20209, name: 'フライトジャケット'},
                {id: 20210, name: 'ピーコート'},
                {id: 20211, name: 'ステンカラーコート'},
                {id: 20212, name: 'トレンチコート'},
                {id: 20213, name: 'モッズコート'},
                {id: 20214, name: 'チェスターコート'},
                {id: 20215, name: 'スタジャン'},
                {id: 20216, name: 'ブルゾン'},
                {id: 20217, name: 'マウンテンパーカー'},
                {id: 20218, name: 'ダウンベスト'},
                {id: 20219, name: 'ポンチョ'},
                {id: 20220, name: 'カバーオール'},
                {id: 20221, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 203) { //メンズ > パンツ
                tmp_grandChildren = [
                {id: 20301, name: 'テーラードジャケット'},
                {id: 20302, name: 'ノーカラージャケット'},
                {id: 20303, name: 'Gジャン/デニムジャケット'},
                {id: 20304, name: 'レザージャケット'},
                {id: 20305, name: 'ダウンジャケット'},
                {id: 20306, name: 'ライダースジャケット'},
                {id: 20307, name: 'ミリタリージャケット'},
                {id: 20308, name: 'ナイロンジャケット'},
                {id: 20309, name: 'フライトジャケット'},
                {id: 20310, name: 'ピーコート'},
                {id: 20311, name: 'ステンカラーコート'},
                {id: 20312, name: 'トレンチコート'},
                {id: 20313, name: 'モッズコート'},
                {id: 20314, name: 'チェスターコート'},
                {id: 20315, name: 'スタジャン'},
                {id: 20316, name: 'ブルゾン'},
                {id: 20317, name: 'マウンテンパーカー'},
                {id: 20318, name: 'ポンチョ'},
                {id: 20319, name: 'カバーオール'},
                {id: 20320, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 204) { //メンズ > 靴
                tmp_grandChildren = [
                {id: 20401, name: 'スニーカー'},
                {id: 20402, name: 'サンダル'},
                {id: 20403, name: 'ブーツ'},
                {id: 20404, name: 'モカシン'},
                {id: 20405, name: 'ドレス/ビジネス'},
                {id: 20406, name: '長靴/レインシューズ'},
                {id: 20407, name: 'デッキシューズ'},
                {id: 20408, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 205) { //メンズ > バッグ
                tmp_grandChildren = [
                {id: 20501, name: 'ショルダーバッグ'},
                {id: 20502, name: 'トートバッグ'},
                {id: 20503, name: 'ボストンバッグ'},
                {id: 20504, name: 'リュック/バックパック'},
                {id: 20505, name: 'ウエストポーチ'},
                {id: 20506, name: 'ボディーバッグ'},
                {id: 20507, name: 'ドラムバッグ'},
                {id: 20508, name: 'ビジネスバッグ'},
                {id: 20509, name: 'トラベルバッグ'},
                {id: 20510, name: 'メッセンジャーバッグ'},
                {id: 20511, name: 'エコバッグ'},
                {id: 20512, name: ''} 
                ]
            }else if (this.CategoryChildren == 206) { //メンズ > スーツ
                tmp_grandChildren = [
                {id: 20601, name: 'スーツジャケット'},
                {id: 20602, name: 'スーツベスト'},
                {id: 20603, name: 'スラックス'},
                {id: 20604, name: 'セットアップ'},
                {id: 20605, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 207) { //メンズ > 帽子
                tmp_grandChildren = [
                {id: 20701, name: 'キャップ'},
                {id: 20702, name: 'ハット'},
                {id: 20703, name: 'ニットキャップ/ビーニー'},
                {id: 20704, name: 'ハンチング/ベレー帽'},
                {id: 20705, name: 'キャスケット'},
                {id: 20706, name: 'サンバイザー'},
                {id: 20707, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 208) { //メンズ > アクセサリー
                tmp_grandChildren = [
                {id: 20801, name: 'ネックレス'},
                {id: 20802, name: 'ブレスレット'},
                {id: 20803, name: 'バングル/リストバンド'},
                {id: 20804, name: 'リング'},
                {id: 20805, name: 'ピアス(片耳用)'},
                {id: 20806, name: 'ピアス(両耳用)'},
                {id: 20807, name: 'アンクレット'},
                {id: 20808, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 209) { //メンズ > 小物
                tmp_grandChildren = [
                {id: 20901, name: '長財布'},
                {id: 20902, name: '折り財布'},
                {id: 20903, name: 'マネークリップ'},
                {id: 20904, name: 'コインケース/小銭入れ'},
                {id: 20905, name: '名刺入れ/定期入れ'},
                {id: 20906, name: 'キーケース'},
                {id: 20907, name: 'キーホルダー'},
                {id: 20908, name: 'ネクタイ'},
                {id: 20909, name: '手袋'},
                {id: 20910, name: 'ハンカチ'},
                {id: 20911, name: 'ベルト'},
                {id: 20912, name: 'マフラー'},
                {id: 20913, name: 'ストール'},
                {id: 20914, name: 'バンダナ'},
                {id: 20915, name: 'ネックウォーマー'},
                {id: 20916, name: 'サスペンダー'},
                {id: 20917, name: 'ウォレットチェーン'},
                {id: 20918, name: 'サングラス/メガネ'},
                {id: 20919, name: 'モバイルケース/カバー'},
                {id: 20920, name: '手帳'},
                {id: 20921, name: 'ストラップ'},
                {id: 20922, name: 'ネクタイピン'},
                {id: 20923, name: 'カフリンクス'},
                {id: 20924, name: 'イヤマフラー'},
                {id: 20925, name: '傘'},
                {id: 20926, name: 'レインコート'},
                {id: 20927, name: 'ミラー'},
                {id: 20928, name: 'タバコグッズ'},
                {id: 20929, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 210) { //メンズ > 時計
                tmp_grandChildren = [
                {id: 21001, name: '腕時計(アナログ)'},
                {id: 21002, name: '腕時計(デジタル)'},
                {id: 21003, name: 'ラバーベルト'},
                {id: 21004, name: 'レザーベルト'},
                {id: 21005, name: '金属ベルト'},
                {id: 21006, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 211) { //メンズ > 水着
                tmp_grandChildren = [
                {id: 21101, name: '一般水着'},
                {id: 21102, name: 'スポーツ用'},
                {id: 21103, name: 'アクセサリー'},
                {id: 21104, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 212) { //メンズ > レッグウェア
                tmp_grandChildren = [
                {id: 21201, name: 'ソックス'},
                {id: 21202, name: 'レギンス/スパッツ'},
                {id: 21203, name: 'レッグウォーマー'},
                {id: 21204, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 213) { //メンズ > アンダーウェア
                tmp_grandChildren = [
                {id: 21301, name: 'トランクス'},
                {id: 21302, name: 'ボクサーパンツ'},
                {id: 21303, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 214) { //メンズ > その他
                tmp_grandChildren = [
                {id: 21401, name: 'その他'},
                ]

            //ベビー
            }else if (this.CategoryChildren == 301) { //ベビー・キッズ > ベビー服(男の子用)
                tmp_grandChildren = [
                {id: 30101, name: 'トップス'},
                {id: 30102, name: 'アウター'},
                {id: 30103, name: 'パンツ'},
                {id: 30104, name: 'おくるみ'},
                {id: 30105, name: '下着/肌着'},
                {id: 30106, name: 'パジャマ'},
                {id: 30107, name: 'ロンパース'},
                {id: 30108, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 302) { //ベビー・キッズ > ベビー服(女の子用)
                tmp_grandChildren = [
                {id: 30201, name: 'トップス'},
                {id: 30202, name: 'アウター'},
                {id: 30203, name: 'パンツ'},
                {id: 30204, name: 'スカート'},
                {id: 30205, name: 'ワンピース'},
                {id: 30206, name: 'ベビードレス'},
                {id: 30207, name: 'おくるみ'},
                {id: 30208, name: '下着/肌着'},
                {id: 30209, name: 'パジャマ'},
                {id: 30210, name: 'ロンパース'},
                {id: 30211, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 303) { //ベビー・キッズ > 子ども用ファッション小物
                tmp_grandChildren = [
                {id: 30301, name: '靴下/スパッツ'},
                {id: 30302, name: '帽子'},
                {id: 30303, name: 'エプロン'},
                {id: 30304, name: 'サスペンダー'},
                {id: 30305, name: 'タイツ'},
                {id: 30306, name: 'ハンカチ'},
                {id: 30307, name: 'バンダナ'},
                {id: 30308, name: 'ベルト'},
                {id: 30309, name: 'マフラー'},
                {id: 30310, name: '傘'},
                {id: 30311, name: '手袋'},
                {id: 30312, name: 'スタイ'},
                {id: 30313, name: 'バッグ'},
                {id: 30314, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 304) { //ベビー・キッズ > 外出/移動用品
                tmp_grandChildren = [
                {id: 30401, name: 'ベビーカー'},
                {id: 30402, name: '抱っこひも/スリング'},
                {id: 30403, name: 'チャイルドシート'},
                {id: 30404, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 305) { //ベビー・キッズ > 授乳/食事
                tmp_grandChildren = [
                {id: 30501, name: 'ミルク'},
                {id: 30502, name: 'ベビーフード'},
                {id: 30503, name: 'ベビー用食器'},
                {id: 30504, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 306) { //ベビー・キッズ > ベビー家具/寝具/室内用品
                tmp_grandChildren = [
                {id: 30601, name: 'ベッド'},
                {id: 30602, name: '布団/毛布'},
                {id: 30603, name: 'たんす'},
                {id: 30604, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 307) { //ベビー・キッズ > おもちゃ
                tmp_grandChildren = [
                {id: 30701, name: 'おふろのおもちゃ'},
                {id: 30702, name: 'がらがら'},
                {id: 30703, name: 'オルゴール'},
                {id: 30704, name: 'ベビージム'},
                {id: 30705, name: '手押し車/カタカタ'},
                {id: 30706, name: '知育玩具'},
                {id: 30707, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 308) { //ベビー・キッズ > 行事/記念品
                tmp_grandChildren = [
                {id: 30801, name: 'お宮参り用品'},
                {id: 30802, name: 'お食い初め用品'},
                {id: 30803, name: 'アルバム'},
                {id: 30804, name: '手形/足形'},
                {id: 30805, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 309) { //ベビー・キッズ > その他
                tmp_grandChildren = [
                {id: 30901, name: '母子手帳用品'},
                {id: 30902, name: 'その他'},
                ]

            //インテリア・住まい・小物
            }else if (this.CategoryChildren == 401) { //インテリア・住まい・小物 > キッチン/食器
                tmp_grandChildren = [
                {id: 40101, name: '食器'},
                {id: 40102, name: '調理器具'},
                {id: 40103, name: '収納/キッチン雑貨'},
                {id: 40104, name: '弁当用品'},
                {id: 40105, name: 'カトラリー(スプーン等)'},
                {id: 40106, name: 'テーブル用品'},
                {id: 40107, name: '容器'},
                {id: 40108, name: 'エプロン'},
                {id: 40109, name: 'アルコールグッズ'},
                {id: 40110, name: '浄水機'},
                {id: 40111, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 402) { //インテリア・住まい・小物 > ベッド/マットレス
                tmp_grandChildren = [
                {id: 40201, name: 'セミシングルベッド'},
                {id: 40202, name: 'シングルベッド'},
                {id: 40203, name: 'セミダブルベッド'},
                {id: 40204, name: 'ダブルベッド'},
                {id: 40205, name: 'ワイドダブルベッド'},
                {id: 40206, name: 'クイーンベッド'},
                {id: 40207, name: 'キングベッド'},
                {id: 40208, name: '脚付きマットレスベッド'},
                {id: 40209, name: 'マットレス'},
                {id: 40210, name: 'ロフトベッド/システムベッド'},
                {id: 40210, name: '簡易ベッド/折りたたみベッド'},
                {id: 40210, name: '収納付き'},
                {id: 40210, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 403) { //インテリア・住まい・小物 > ソファ/ソファベッド
                tmp_grandChildren = [
                {id: 40301, name: 'ソファセット'},
                {id: 40302, name: 'シングルソファ'},
                {id: 40303, name: 'ラブソファ'},
                {id: 40304, name: 'トリプルソファ'},
                {id: 40305, name: 'オットマン'},
                {id: 40306, name: 'コーナーソファ'},
                {id: 40307, name: 'ビーズソファ/クッションソファ'},
                {id: 40308, name: 'ローソファ/フロアソファ'},
                {id: 40309, name: 'ソファベッド'},
                {id: 40310, name: '応接セット'},
                {id: 40311, name: 'ソファカバー'},
                {id: 40312, name: 'リクライニングソファ'},
                {id: 40313, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 404) { //インテリア・住まい・小物 > 椅子/チェア
                tmp_grandChildren = [
                {id: 40401, name: '一般'},
                {id: 40402, name: 'スツール'},
                {id: 40403, name: 'ダイニングチェア'},
                {id: 40404, name: 'ハイバックチェア'},
                {id: 40405, name: 'ロッキングチェア'},
                {id: 40406, name: '座椅子'},
                {id: 40407, name: '折り畳みイス'},
                {id: 40408, name: 'デスクチェア'},
                {id: 40409, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 405) { //インテリア・住まい・小物 > 机/テーブル
                tmp_grandChildren = [
                {id: 40501, name: 'こたつ'},
                {id: 40502, name: 'カウンターテーブル'},
                {id: 40503, name: 'サイドテーブル'},
                {id: 40504, name: 'センターテーブル'},
                {id: 40505, name: 'ダイニングテーブル'},
                {id: 40506, name: '座卓/ちゃぶ台'},
                {id: 40507, name: 'アウトドア用'},
                {id: 40508, name: 'パソコン用'},
                {id: 40509, name: '事務机/学習机'},
                {id: 40510, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 406) { //インテリア・住まい・小物 > 収納家具
                tmp_grandChildren = [
                {id: 40601, name: 'リビング収納'},
                {id: 40602, name: 'キッチン収納'},
                {id: 40603, name: '玄関/屋外収納'},
                {id: 40604, name: 'バス/トイレ収納'},
                {id: 40605, name: '本収納'},
                {id: 40606, name: '本/CD/DVD収納'},
                {id: 40607, name: '洋服タンス/押入れ収納'},
                {id: 40608, name: '電話台/ファックス台'},
                {id: 40609, name: 'ドレッサー/鏡台'},
                {id: 40610, name: '棚/ラック'},
                {id: 40610, name: 'ケース/ボックス'},
                {id: 40610, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 407) { //インテリア・住まい・小物 > ラグ/カーペット/マット
                tmp_grandChildren = [
                {id: 40701, name: 'ラグ'},
                {id: 40702, name: 'カーペット'},
                {id: 40703, name: 'ホットカーペット'},
                {id: 40704, name: '玄関/キッチンマット'},
                {id: 40705, name: 'トイレ/バスマット'},
                {id: 40706, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 408) { //インテリア・住まい・小物 > カーテン/ブラインド
                tmp_grandChildren = [
                {id: 40801, name: 'カーテン'},
                {id: 40802, name: 'ブラインド'},
                {id: 40803, name: 'ロールスクリーン'},
                {id: 40804, name: 'のれん'},
                {id: 40805, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 409) { //インテリア・住まい・小物 > ライト/照明
                tmp_grandChildren = [
                {id: 40901, name: '蛍光灯/電球'},
                {id: 40902, name: '天井照明'},
                {id: 40903, name: 'フロアスタンド'},
                {id: 40904, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 410) { //インテリア・住まい・小物 > 寝具
                tmp_grandChildren = [
                {id: 41001, name: '布団/毛布'},
                {id: 41002, name: '枕'},
                {id: 41003, name: 'シーツ/カバー'},
                {id: 41004, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 411) { //インテリア・住まい・小物 > インテリア小物
                tmp_grandChildren = [
                {id: 41101, name: 'ごみ箱'},
                {id: 41102, name: 'ウェルカムボード'},
                {id: 41103, name: 'オルゴール'},
                {id: 41104, name: 'クッション'},
                {id: 41105, name: 'クッションカバー'},
                {id: 41106, name: 'スリッパラック'},
                {id: 41107, name: 'ティッシュボックス'},
                {id: 41108, name: 'バスケット/かご'},
                {id: 41109, name: 'フォトフレーム'},
                {id: 41110, name: 'マガジンラック'},
                {id: 41111, name: 'モビール'},
                {id: 41112, name: '花瓶'},
                {id: 41113, name: '灰皿'},
                {id: 41114, name: '傘立て'},
                {id: 41115, name: '小物入れ'},
                {id: 41116, name: '置時計'},
                {id: 41117, name: '掛時計/柱時計'},
                {id: 41118, name: '鏡(立て掛け式)'},
                {id: 41119, name: '鏡(壁掛け式)'},
                {id: 41120, name: '置物'},
                {id: 41121, name: '風鈴'},
                {id: 41122, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 412) { //インテリア・住まい・小物 > 季節/年中行事
                tmp_grandChildren = [
                {id: 41201, name: '正月'},
                {id: 41202, name: '成人式'},
                {id: 41203, name: 'バレンタインデー'},
                {id: 41204, name: 'ひな祭り'},
                {id: 41205, name: '子どもの日'},
                {id: 41206, name: '母の日'},
                {id: 41207, name: '父の日'},
                {id: 41208, name: 'サマーギフト/お中元'},
                {id: 41209, name: '夏/夏休み'},
                {id: 41210, name: 'ハロウィン'},
                {id: 41211, name: '敬老の日'},
                {id: 41212, name: '七五三'},
                {id: 41213, name: 'お歳暮'},
                {id: 41214, name: 'クリスマス'},
                {id: 41215, name: '冬一般'},
                {id: 41216, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 413) { //インテリア・住まい・小物 > その他
                tmp_grandChildren = [
                {id: 41301, name: 'その他'},
                ]

            //本・音楽・ゲーム
            }else if (this.CategoryChildren == 501) { //本・音楽・ゲーム > 本
                tmp_grandChildren = [
                {id: 50101, name: '文学/小説'},
                {id: 50102, name: '人文/社会'},
                {id: 50103, name: 'ノンフィクション/教養'},
                {id: 50104, name: '地図/旅行ガイド'},
                {id: 50105, name: 'ビジネス/経済'},
                {id: 50106, name: '健康/医学'},
                {id: 50107, name: 'コンピュータ/IT'},
                {id: 50108, name: '趣味/スポーツ/実用'},
                {id: 50109, name: '住まい/暮らし/子育て'},
                {id: 50110, name: 'アート/エンタメ'},
                {id: 50111, name: '洋書'},
                {id: 50112, name: '絵本'},
                {id: 50113, name: '参考書'},
                {id: 50114, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 502) { //本・音楽・ゲーム > 漫画
                tmp_grandChildren = [
                {id: 50201, name: '全巻セット'},
                {id: 50202, name: '少年漫画'},
                {id: 50203, name: '少女漫画'},
                {id: 50204, name: '青年漫画'},
                {id: 50205, name: '女性漫画'},
                {id: 50206, name: '同人誌'},
                {id: 50207, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 503) { //本・音楽・ゲーム > 雑誌
                tmp_grandChildren = [
                {id: 50301, name: 'アート/エンタメ/ホビー'},
                {id: 50302, name: 'ファッション'},
                {id: 50303, name: 'ニュース/総合'},
                {id: 50304, name: '趣味/スポーツ'},
                {id: 50305, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 504) { //本・音楽・ゲーム > CD
                tmp_grandChildren = [
                {id: 50401, name: '邦楽'},
                {id: 50402, name: '洋楽'},
                {id: 50403, name: 'アニメ'},
                {id: 50404, name: 'クラシック'},
                {id: 50405, name: 'K-POP/アジア'},
                {id: 50406, name: 'キッズ/ファミリー'},
                {id: 50407, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 505) { //本・音楽・ゲーム > DVD/ブルーレイ
                tmp_grandChildren = [
                {id: 50501, name: '外国映画'},
                {id: 50502, name: '日本映画'},
                {id: 50503, name: 'アニメ'},
                {id: 50504, name: 'TVドラマ'},
                {id: 50505, name: 'ミュージック'},
                {id: 50506, name: 'お笑い/バラエティ'},
                {id: 50507, name: 'スポーツ/フィットネス'},
                {id: 50508, name: 'キッズ/ファミリー'},
                {id: 50509, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 506) { //本・音楽・ゲーム > レコード
                tmp_grandChildren = [
                {id: 50601, name: '邦楽'},
                {id: 50602, name: '洋楽'},
                {id: 50603, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 507) { //本・音楽・ゲーム > テレビゲーム
                tmp_grandChildren = [
                {id: 50701, name: '家庭用ゲーム本体'},
                {id: 50702, name: '家庭用ゲームソフト'},
                {id: 50703, name: '携帯用ゲーム本体'},
                {id: 50704, name: '携帯用ゲームソフト'},
                {id: 50705, name: 'PCゲーム'},
                {id: 50706, name: 'その他'},
                ]

            //おもちゃ・ホビー・グッズ
            }else if (this.CategoryChildren == 601) { //おもちゃ・ホビー・グッズ > おもちゃ
                tmp_grandChildren = [
                {id: 60101, name: 'キャラクターグッズ'},
                {id: 60102, name: 'ぬいぐるみ'},
                {id: 60103, name: '小物/アクセサリー'},
                {id: 60104, name: '模型/プラモデル'},
                {id: 60105, name: 'ミニカー'},
                {id: 60106, name: 'トイラジコン'},
                {id: 60107, name: 'プラモデル'},
                {id: 60108, name: 'ホビーラジコン'},
                {id: 60109, name: '鉄道模型'},
                {id: 60110, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 602) { //おもちゃ・ホビー・グッズ > タレントグッズ
                tmp_grandChildren = [
                {id: 60201, name: 'アイドル'},
                {id: 60202, name: 'ミュージシャン'},
                {id: 60203, name: 'タレント/お笑い芸人'},
                {id: 60204, name: 'スポーツ選手'},
                {id: 60205, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 603) { //おもちゃ・ホビー・グッズ > コミック/アニメグッズ
                tmp_grandChildren = [
                {id: 60301, name: 'ストラップ'},
                {id: 60302, name: 'キーホルダー'},
                {id: 60303, name: 'バッジ'},
                {id: 60304, name: 'カード'},
                {id: 60305, name: 'クリアファイル'},
                {id: 60306, name: 'タオル'},
                {id: 60307, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 604) { //おもちゃ・ホビー・グッズ > トレーディングカード
                tmp_grandChildren = [
                {id: 60401, name: '遊戯王'},
                {id: 60402, name: 'マジック：ザ・ギャザリング'},
                {id: 60403, name: 'ポケモンカードゲーム'},
                {id: 60404, name: 'デュエルマスターズ'},
                {id: 60405, name: 'バトルスピリッツ'},
                {id: 60406, name: 'プリパラ'},
                {id: 60407, name: 'アイカツ'},
                {id: 60408, name: 'カードファイト!! ヴァンガード'},
                {id: 60409, name: 'ヴァイスシュヴァルツ'},
                {id: 60410, name: 'プロ野球オーナーズリーグ'},
                {id: 60411, name: 'ベースボールヒーローズ'},
                {id: 60412, name: 'トップス'},
                {id: 60413, name: 'ドラゴンボール'},
                {id: 60414, name: 'スリーブ'},
                {id: 60415, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 605) { //おもちゃ・ホビー・グッズ > フィギュア
                tmp_grandChildren = [
                {id: 60501, name: 'コミック/アニメ'},
                {id: 60502, name: '特撮'},
                {id: 60503, name: 'ゲームキャラクター'},
                {id: 60504, name: 'SF/ファンタジー/ホラー'},
                {id: 60505, name: 'アメコミ'},
                {id: 60506, name: 'スポーツ'},
                {id: 60507, name: 'ミリタリー'},
                {id: 60508, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 606) { //おもちゃ・ホビー・グッズ > 楽器/器材
                tmp_grandChildren = [
                {id: 60601, name: 'エレキギター'},
                {id: 60602, name: 'アコースティックギター'},
                {id: 60603, name: 'ベース'},
                {id: 60604, name: 'エフェクター'},
                {id: 60605, name: 'アンプ'},
                {id: 60606, name: '弦楽器'},
                {id: 60607, name: '管楽器'},
                {id: 60608, name: '鍵盤楽器'},
                {id: 60609, name: '打楽器'},
                {id: 60610, name: '和楽器'},
                {id: 60611, name: '楽譜/スコア'},
                {id: 60612, name: 'レコーディング/PA機器'},
                {id: 60613, name: 'DJ機器'},
                {id: 60614, name: 'DTM/DAW'},
                {id: 60615, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 607) { //おもちゃ・ホビー・グッズ > コレクション
                tmp_grandChildren = [
                {id: 60701, name: '武具'},
                {id: 60702, name: '使用済切手/官製はがき'},
                {id: 60703, name: '旧貨幣/金貨/銀貨/記念硬貨'},
                {id: 60704, name: '印刷物'},
                {id: 60705, name: 'ノベルティグッズ'},
                {id: 60706, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 608) { //おもちゃ・ホビー・グッズ > ミリタリー
                tmp_grandChildren = [
                {id: 60801, name: 'トイガン'},
                {id: 60802, name: '個人装備'},
                {id: 60803, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 609) { //おもちゃ・ホビー・グッズ > 美術品
                tmp_grandChildren = [
                {id: 60901, name: '陶芸'},
                {id: 60902, name: 'ガラス'},
                {id: 60903, name: '漆芸'},
                {id: 60904, name: '金属工芸'},
                {id: 60905, name: '絵画/タペストリ'},
                {id: 60906, name: '版画'},
                {id: 60907, name: '彫刻/オブジェクト'},
                {id: 60908, name: '書'},
                {id: 60909, name: '写真'},
                {id: 60910, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 610) { //おもちゃ・ホビー・グッズ > アート用品
                tmp_grandChildren = [
                {id: 61001, name: '画材'},
                {id: 61002, name: '額縁'},
                {id: 61003, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 611) { //おもちゃ・ホビー・グッズ > その他
                tmp_grandChildren = [
                {id: 61101, name: 'トランプ/UNO'},
                {id: 61102, name: 'カルタ/百人一首'},
                {id: 61103, name: 'ダーツ'},
                {id: 61104, name: 'ビリヤード'},
                {id: 61105, name: '麻雀'},
                {id: 61106, name: 'パズル/ジグソーパズル'},
                {id: 61107, name: '囲碁/将棋'},
                {id: 61108, name: 'オセロ/チェス'},
                {id: 61109, name: '人生ゲーム'},
                {id: 61110, name: '野球/サッカーゲーム'},
                {id: 61111, name: 'スポーツ'},
                {id: 61112, name: '三輪車/乗り物'},
                {id: 61113, name: 'ヨーヨー'},
                {id: 61114, name: '模型製作用品'},
                {id: 61115, name: '鉄道'},
                {id: 61116, name: '航空機'},
                {id: 61117, name: 'アマチュア無線'},
                {id: 61118, name: 'パチンコ/パチスロ'},
                {id: 61119, name: 'その他'},
                ]

            //コスメ・香水・美容
            }else if (this.CategoryChildren == 701) { //コスメ・香水・美容 > ベースメイク
                tmp_grandChildren = [
                {id: 70101, name: 'ファンデーション'},
                {id: 70102, name: '化粧下地'},
                {id: 70103, name: 'コントロールカラー'},
                {id: 70104, name: 'BBクリーム'},
                {id: 70105, name: 'CCクリーム'},
                {id: 70106, name: 'コンシーラー'},
                {id: 70107, name: 'フェイスパウダー'},
                {id: 70108, name: 'トライアルセット/サンプル'},
                {id: 70109, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 702) { //コスメ・香水・美容 > メイクアップ
                tmp_grandChildren = [
                {id: 70201, name: 'アイシャドウ'},
                {id: 70202, name: '口紅'},
                {id: 70203, name: 'リップグロス'},
                {id: 70204, name: 'リップライナー'},
                {id: 70205, name: 'チーク'},
                {id: 70206, name: 'フェイスカラー'},
                {id: 70207, name: 'マスカラ'},
                {id: 70208, name: 'アイライナー'},
                {id: 70209, name: 'つけまつげ'},
                {id: 70210, name: 'アイブロウペンシル'},
                {id: 70211, name: 'パウダーアイブロウ'},
                {id: 70212, name: '眉マスカラ'},
                {id: 70213, name: 'トライアルセット/サンプル'},
                {id: 70214, name: 'メイク道具/化粧小物'},
                {id: 70215, name: '美顔用品/美顔ローラー'},
                {id: 70216, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 703) { //コスメ・香水・美容 > ネイルケア
                tmp_grandChildren = [
                {id: 70301, name: 'ネイルカラー'},
                {id: 70302, name: 'カラージェル'},
                {id: 70303, name: 'ネイルベースコート/トップコート'},
                {id: 70304, name: 'ネイルアート用品'},
                {id: 70305, name: 'ネイルパーツ'},
                {id: 70306, name: 'ネイルチップ/付け爪'},
                {id: 70307, name: '手入れ用具'},
                {id: 70308, name: '除光液'},
                {id: 70309, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 704) { //コスメ・香水・美容 > 香水
                tmp_grandChildren = [
                {id: 70401, name: '香水(女性用)'},
                {id: 70402, name: '香水(男性用)'},
                {id: 70403, name: 'ユニセックス'},
                {id: 70404, name: 'ボディミスト'},
                {id: 70405, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 705) { //コスメ・香水・美容 > スキンケア/基礎化粧品
                tmp_grandChildren = [
                {id: 70501, name: '化粧水/ローション'},
                {id: 70502, name: '乳液/ミルク'},
                {id: 70503, name: '美容液'},
                {id: 70504, name: 'フェイスクリーム'},
                {id: 70505, name: '洗顔料'},
                {id: 70506, name: 'クレンジング/メイク落とし'},
                {id: 70507, name: 'パック/フェイスマスク'},
                {id: 70508, name: 'ジェル/ゲル'},
                {id: 70509, name: 'ブースター/導入液'},
                {id: 70510, name: 'アイケア'},
                {id: 70511, name: 'リップケア'},
                {id: 70512, name: 'トライアルセット/サンプル'},
                {id: 70513, name: 'アイケア'},
                {id: 70514, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 706) { //コスメ・香水・美容 > ヘアケア
                tmp_grandChildren = [
                {id: 70601, name: 'シャンプー'},
                {id: 70602, name: 'トリートメント'},
                {id: 70603, name: 'コンディショナー'},
                {id: 70604, name: 'リンス'},
                {id: 70605, name: 'スタイリング剤'},
                {id: 70606, name: 'カラーリング剤'},
                {id: 70607, name: 'ブラシ'},
                {id: 70608, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 707) { //コスメ・香水・美容 > ボディケア
                tmp_grandChildren = [
                {id: 70701, name: 'オイル/クリーム'},
                {id: 70702, name: 'ハンドクリーム'},
                {id: 70703, name: 'ローション'},
                {id: 70704, name: '日焼け止め/サンオイル'},
                {id: 70705, name: 'ボディソープ'},
                {id: 70706, name: '入浴剤'},
                {id: 70707, name: '制汗/デオドラント'},
                {id: 70708, name: 'フットケア'},
                {id: 70709, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 708) { //コスメ・香水・美容 > オーラルケア
                tmp_grandChildren = [
                {id: 70801, name: '口臭防止/エチケット用品'},
                {id: 70802, name: '歯ブラシ'},
                {id: 70803, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 709) { //コスメ・香水・美容 > リラクゼーション
                tmp_grandChildren = [
                {id: 70901, name: 'エッセンシャルオイル'},
                {id: 70902, name: '芳香器'},
                {id: 70903, name: 'お香/香炉'},
                {id: 70904, name: 'キャンドル'},
                {id: 70905, name: 'リラクゼーショングッズ'},
                {id: 70906, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 710) { //コスメ・香水・美容 > ダイエット
                tmp_grandChildren = [
                {id: 71001, name: 'ダイエット食品'},
                {id: 71002, name: 'エクササイズ用品'},
                {id: 71003, name: '体重計'},
                {id: 71004, name: '体脂肪計'},
                {id: 71005, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 711) { //コスメ・香水・美容 > その他
                tmp_grandChildren = [
                {id: 71101, name: '健康用品'},
                {id: 71102, name: '看護/介護用品'},
                {id: 71103, name: '救急/衛生用品'},
                {id: 71104, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 801) { //家電・スマホ・カメラ > スマートフォン/携帯電話
                tmp_grandChildren = [
                {id: 80101, name: 'スマートフォン本体'},
                {id: 80102, name: 'バッテリー/充電器'},
                {id: 80103, name: '携帯電話本体'},
                {id: 80104, name: 'PHS本体'},
                {id: 80105, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 802) { //家電・スマホ・カメラ > スマホアクセサリー
                tmp_grandChildren = [
                {id: 80201, name: 'Android用ケース'},
                {id: 80202, name: 'iPhone用ケース'},
                {id: 80203, name: 'カバー'},
                {id: 80204, name: 'イヤホンジャック'},
                {id: 80205, name: 'ストラップ'},
                {id: 80206, name: 'フィルム'},
                {id: 80207, name: '自撮り棒'},
                {id: 80208, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 803) { //家電・スマホ・カメラ > PC/タブレット
                tmp_grandChildren = [
                {id: 80301, name: 'タブレット'},
                {id: 80302, name: 'ノートPC'},
                {id: 80303, name: 'デスクトップ型PC'},
                {id: 80304, name: 'ディスプレイ'},
                {id: 80305, name: '電子ブックリーダー'},
                {id: 80306, name: 'PC周辺機器'},
                {id: 80307, name: 'PCパーツ'},
                {id: 80308, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 804) { //家電・スマホ・カメラ > カメラ
                tmp_grandChildren = [
                {id: 80401, name: 'デジタルカメラ'},
                {id: 80402, name: 'ビデオカメラ'},
                {id: 80403, name: 'レンズ(単焦点)'},
                {id: 80404, name: 'レンズ(ズーム)'},
                {id: 80405, name: 'フィルムカメラ'},
                {id: 80406, name: '防犯カメラ'},
                {id: 80407, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 805) { //家電・スマホ・カメラ > テレビ/映像機器
                tmp_grandChildren = [
                {id: 80501, name: 'テレビ'},
                {id: 80502, name: 'プロジェクター'},
                {id: 80503, name: 'ブルーレイレコーダー'},
                {id: 80504, name: 'DVDレコーダー'},
                {id: 80505, name: 'ブルーレイプレーヤー'},
                {id: 80506, name: 'DVDプレーヤー'},
                {id: 80507, name: '映像用ケーブル'},
                {id: 80508, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 806) { //家電・スマホ・カメラ > オーディオ機器
                tmp_grandChildren = [
                {id: 80601, name: 'ポータブルプレーヤー'},
                {id: 80602, name: 'イヤフォン'},
                {id: 80603, name: 'ヘッドフォン'},
                {id: 80604, name: 'アンプ'},
                {id: 80605, name: 'スピーカー'},
                {id: 80606, name: 'ケーブル/シールド'},
                {id: 80607, name: 'ラジオ'},
                {id: 80608, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 807) { //家電・スマホ・カメラ > 美容/健康
                tmp_grandChildren = [
                {id: 80701, name: 'ヘアドライヤー'},
                {id: 80702, name: 'ヘアアイロン'},
                {id: 80703, name: '美容機器'},
                {id: 80704, name: '電気シェーバー'},
                {id: 80705, name: '電動歯ブラシ'},
                {id: 80706, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 808) { //家電・スマホ・カメラ > 冷暖房/空調
                tmp_grandChildren = [
                {id: 80801, name: 'エアコン'},
                {id: 80802, name: '空気清浄器'},
                {id: 80803, name: '加湿器'},
                {id: 80804, name: '扇風機'},
                {id: 80805, name: '除湿機'},
                {id: 80806, name: 'ファンヒーター'},
                {id: 80807, name: '電気ヒーター'},
                {id: 80808, name: 'オイルヒーター'},
                {id: 80809, name: 'ストーブ'},
                {id: 80810, name: 'ホットカーペット'},
                {id: 80811, name: 'こたつ'},
                {id: 80812, name: '電気毛布'},
                {id: 80813, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 809) { //家電・スマホ・カメラ > 生活家電
                tmp_grandChildren = [
                {id: 80901, name: '冷蔵庫'},
                {id: 80902, name: '洗濯機'},
                {id: 80903, name: '炊飯器'},
                {id: 80904, name: '電子レンジ/オーブン'},
                {id: 80905, name: '調理機器'},
                {id: 80906, name: 'アイロン'},
                {id: 80907, name: '掃除機'},
                {id: 80908, name: 'エスプレッソマシン'},
                {id: 80909, name: 'コーヒーメーカー'},
                {id: 80910, name: '衣類乾燥機'},
                {id: 80910, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 810) { //家電・スマホ・カメラ > その他
                tmp_grandChildren = [
                {id: 81001, name: 'その他'},
                ]

            //スポーツ・レジャー
            }else if (this.CategoryChildren == 901) { //スポーツ・レジャー > ゴルフ
                tmp_grandChildren = [
                {id: 90101, name: 'クラブ'},
                {id: 90102, name: 'ウエア(男性用)'},
                {id: 90103, name: 'ウエア(女性用)'},
                {id: 90104, name: 'バッグ'},
                {id: 90105, name: 'シューズ(男性用)'},
                {id: 90106, name: 'シューズ(女性用)'},
                {id: 90107, name: 'アクセサリー'},
                {id: 90108, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 902) { //スポーツ・レジャー > フィッシング
                tmp_grandChildren = [
                {id: 90201, name: 'ロッド'},
                {id: 90202, name: 'リール'},
                {id: 90203, name: 'ルアー用品'},
                {id: 90204, name: 'ウエア'},
                {id: 90205, name: '釣り糸/ライン'},
                {id: 90206, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 903) { //スポーツ・レジャー > 自転車
                tmp_grandChildren = [
                {id: 90301, name: '自転車本体'},
                {id: 90302, name: 'ウエア'},
                {id: 90303, name: 'パーツ'},
                {id: 90304, name: 'アクセサリー'},
                {id: 90305, name: 'バッグ'},
                {id: 90306, name: '工具/メンテナンス'},
                {id: 90307, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 904) { //スポーツ・レジャー > トレーニング/エクササイズ
                tmp_grandChildren = [
                {id: 90401, name: 'ランニング'},
                {id: 90402, name: 'ウォーキング'},
                {id: 90403, name: 'ヨガ'},
                {id: 90404, name: 'トレーニング用品'},
                {id: 90405, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 905) { //スポーツ・レジャー > 野球
                tmp_grandChildren = [
                {id: 90501, name: 'ウェア'},
                {id: 90502, name: 'シューズ'},
                {id: 90503, name: 'グローブ'},
                {id: 90504, name: 'バット'},
                {id: 90505, name: 'アクセサリー'},
                {id: 90506, name: '防具'},
                {id: 90507, name: '練習機器'},
                {id: 90508, name: '記念グッズ'},
                {id: 90509, name: '応援グッズ'},
                {id: 90510, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 906) { //スポーツ・レジャー > サッカー/フットサル
                tmp_grandChildren = [
                {id: 90601, name: 'ウェア'},
                {id: 90602, name: 'シューズ'},
                {id: 90603, name: 'ボール'},
                {id: 90604, name: 'アクセサリー'},
                {id: 90605, name: '記念グッズ'},
                {id: 90606, name: '応援グッズ'},
                {id: 90607, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 907) { //スポーツ・レジャー > テニス
                tmp_grandChildren = [
                {id: 90701, name: 'ラケット(硬式用)'},
                {id: 90702, name: 'ラケット(軟式用)'},
                {id: 90703, name: 'ウェア'},
                {id: 90704, name: 'シューズ'},
                {id: 90705, name: 'ボール'},
                {id: 90706, name: 'アクセサリー'},
                {id: 90707, name: '記念グッズ'},
                {id: 90708, name: '応援グッズ'},
                {id: 90709, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 908) { //スポーツ・レジャー > スノーボード
                tmp_grandChildren = [
                {id: 90801, name: 'ボード'},
                {id: 90802, name: 'バインディング'},
                {id: 90803, name: 'ブーツ(男性用)'},
                {id: 90804, name: 'ブーツ(女性用)'},
                {id: 90805, name: 'ブーツ(子ども用)'},
                {id: 90806, name: 'ウエア/装備(男性用)'},
                {id: 90807, name: 'ウエア/装備(女性用)'},
                {id: 90808, name: 'ウエア/装備(子ども用)'},
                {id: 90809, name: 'アクセサリー'},
                {id: 90810, name: 'バッグ'},
                {id: 90811, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 909) { //スポーツ・レジャー > スキー
                tmp_grandChildren = [
                {id: 90901, name: '板'},
                {id: 90902, name: 'ブーツ(男性用)'},
                {id: 90903, name: 'ブーツ(女性用)'},
                {id: 90904, name: 'ブーツ(子ども用)'},
                {id: 90905, name: 'ビンディング'},
                {id: 90906, name: 'ウエア(男性用)'},
                {id: 90907, name: 'ウエア(女性用)'},
                {id: 90908, name: 'ウエア(子ども用)'},
                {id: 90909, name: 'ストック'},
                {id: 90910, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 910) { //スポーツ・レジャー > その他スポーツ
                tmp_grandChildren = [
                {id: 91001, name: 'ダンス/バレエ'},
                {id: 91002, name: 'サーフィン'},
                {id: 91003, name: 'バスケットボール'},
                {id: 91004, name: 'バドミントン'},
                {id: 91005, name: 'バレーボール'},
                {id: 91006, name: 'スケートボード'},
                {id: 91007, name: '陸上競技'},
                {id: 91008, name: 'ラグビー'},
                {id: 91009, name: 'アメリカンフットボール'},
                {id: 91010, name: 'ボクシング'},
                {id: 91011, name: 'ボウリング'},
                {id: 91012, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 911) { //スポーツ・レジャー > アウトドア
                tmp_grandChildren = [
                {id: 91101, name: 'テント/タープ'},
                {id: 91102, name: 'ライト/ランタン'},
                {id: 91103, name: '寝袋/寝具'},
                {id: 91104, name: 'テーブル/チェア'},
                {id: 91105, name: 'ストーブ/コンロ'},
                {id: 91106, name: '調理器具'},
                {id: 91107, name: '食器'},
                {id: 91108, name: '登山用品'},
                {id: 91109, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 912) { //スポーツ・レジャー > その他
                tmp_grandChildren = [
                {id: 91201, name: '旅行用品'},
                {id: 91202, name: 'その他'},
                ]

            //ハンドメイド
            }else if (this.CategoryChildren == 1001) { //ハンドメイド> アクセサリー(女性用)
                tmp_grandChildren = [
                {id: 100101, name: 'ピアス'},
                {id: 100102, name: 'イヤリング'},
                {id: 100103, name: 'ネックレス'},
                {id: 100104, name: 'ブレスレット'},
                {id: 100105, name: 'リング'},
                {id: 100106, name: 'チャーム'},
                {id: 100107, name: 'ヘアゴム'},
                {id: 100108, name: 'アンクレット'},
                {id: 100109, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1002) { //ハンドメイド > ファッション/小物
                tmp_grandChildren = [
                {id: 100201, name: 'バッグ(女性用)'},
                {id: 100202, name: 'バッグ(男性用)'},
                {id: 100203, name: '財布(女性用)'},
                {id: 100204, name: '財布(男性用)'},
                {id: 100205, name: 'ファッション雑貨'},
                {id: 100206, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1003) { //ハンドメイド > アクセサリー/時計
                tmp_grandChildren = [
                {id: 100301, name: 'アクセサリー(男性用)'},
                {id: 100302, name: '時計(女性用)'},
                {id: 100303, name: '時計(男性用)'},
                {id: 100304, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1004) { //ハンドメイド > 日用品/インテリア
                tmp_grandChildren = [
                {id: 100401, name: 'キッチン用品'},
                {id: 100402, name: '家具'},
                {id: 100403, name: '文房具'},
                {id: 100404, name: 'アート/写真'},
                {id: 100405, name: 'アロマ/キャンドル'},
                {id: 100406, name: 'フラワー/ガーデン'},
                {id: 100407, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1005) { //ハンドメイド > 趣味/おもちゃ
                tmp_grandChildren = [
                {id: 100501, name: 'クラフト/布製品'},
                {id: 100502, name: 'おもちゃ/人形'},
                {id: 100503, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1006) { //ハンドメイド > キッズ/ベビー
                tmp_grandChildren = [
                {id: 100601, name: 'ファッション雑貨'},
                {id: 100602, name: 'スタイ/よだれかけ'},
                {id: 100603, name: '外出用品'},
                {id: 100604, name: 'ネームタグ'},
                {id: 100605, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1007) { //ハンドメイド > 素材/材料
                tmp_grandChildren = [
                {id: 100701, name: '各種パーツ'},
                {id: 100702, name: '生地/糸'},
                {id: 100703, name: '型紙/パターン'},
                {id: 100704, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1008) { //ハンドメイド > 二次創作物
                tmp_grandChildren = [
                {id: 100801, name: 'Ingress'},
                {id: 100802, name: 'クリエイターズ宇宙兄弟'},
                ]
            }else if (this.CategoryChildren == 1009) { //ハンドメイド > その他
                tmp_grandChildren = [
                {id: 100901, name: 'その他'},
                ]

            //チケット
            }else if (this.CategoryChildren == 1101) { //チケット > 音楽
                tmp_grandChildren = [
                {id: 110101, name: '男性アイドル'},
                {id: 110102, name: '女性アイドル'},
                {id: 110103, name: '韓流'},
                {id: 110104, name: '国内アーティスト'},
                {id: 110105, name: '海外アーティスト'},
                {id: 110106, name: '音楽フェス'},
                {id: 110107, name: '声優/アニメ'},
                {id: 110108, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1102) { //チケット > スポーツ
                tmp_grandChildren = [
                {id: 110201, name: 'サッカー'},
                {id: 110202, name: '野球'},
                {id: 110203, name: 'テニス'},
                {id: 110204, name: '格闘技/プロレス'},
                {id: 110205, name: '相撲/武道'},
                {id: 110206, name: 'ゴルフ'},
                {id: 110207, name: 'バレーボール'},
                {id: 110208, name: 'バスケットボール'},
                {id: 110209, name: 'モータースポーツ'},
                {id: 110210, name: 'ウィンタースポーツ'},
                {id: 110211, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1103) { //チケット > 演劇/芸能
                tmp_grandChildren = [
                {id: 110301, name: 'ミュージカル'},
                {id: 110302, name: '演劇'},
                {id: 110303, name: '伝統芸能'},
                {id: 110304, name: '落語'},
                {id: 110305, name: 'お笑い'},
                {id: 110306, name: 'オペラ'},
                {id: 110307, name: 'サーカス'},
                {id: 110308, name: 'バレエ'},
                {id: 110309, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1104) { //チケット > イベント
                tmp_grandChildren = [
                {id: 110401, name: '声優/アニメ'},
                {id: 110402, name: 'キッズ/ファミリー'},
                {id: 110403, name: 'トークショー/講演会'},
                {id: 110404, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1105) { //チケット > 映画
                tmp_grandChildren = [
                {id: 110501, name: '邦画'},
                {id: 110502, name: '洋画'},
                {id: 110503, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1106) { //チケット > 施設利用券
                tmp_grandChildren = [
                {id: 110601, name: '遊園地/テーマパーク'},
                {id: 110602, name: '美術館/博物館'},
                {id: 110603, name: 'スキー場'},
                {id: 110604, name: 'ゴルフ場'},
                {id: 110605, name: 'フィットネスクラブ'},
                {id: 110606, name: 'プール'},
                {id: 110607, name: 'ボウリング場'},
                {id: 110608, name: '水族館'},
                {id: 110609, name: '動物園'},
                {id: 110610, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1107) { //チケット > 優待券/割引券
                tmp_grandChildren = [
                {id: 110701, name: 'ショッピング'},
                {id: 110702, name: 'レストラン/食事券'},
                {id: 110703, name: 'フード/ドリンク券'},
                {id: 110704, name: '宿泊券'},
                {id: 110705, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1108) { //チケット > その他
                tmp_grandChildren = [
                {id: 110801, name: 'その他'},
                ]

            //自動車・オートバイ
            }else if (this.CategoryChildren == 1201) { //自動車・オートバイ > 自動車本体
                tmp_grandChildren = [
                {id: 120101, name: '国内自動車本体'},
                {id: 120102, name: '外国自動車本体'},
                ]
            }else if (this.CategoryChildren == 1202) { //自動車・オートバイ > 自動車タイヤ/ホイール
                tmp_grandChildren = [
                {id: 120201, name: 'タイヤ/ホイールセット'},
                {id: 120202, name: 'タイヤ'},
                {id: 120203, name: 'ホイール'},
                {id: 120204, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1203) { //自動車・オートバイ > 自動車パーツ
                tmp_grandChildren = [
                {id: 120301, name: 'サスペンション'},
                {id: 120302, name: 'ブレーキ'},
                {id: 120303, name: '外装、エアロパーツ'},
                {id: 120304, name: 'ライト'},
                {id: 120305, name: '内装品、シート'},
                {id: 120306, name: 'ステアリング'},
                {id: 120307, name: 'マフラー・排気系'},
                {id: 120308, name: 'エンジン、過給器、冷却装置'},
                {id: 120309, name: 'クラッチ、ミッション、駆動系'},
                {id: 120310, name: '電装品'},
                {id: 120311, name: '補強パーツ'},
                {id: 120312, name: '汎用パーツ'},
                {id: 120313, name: '外国自動車用パーツ'},
                {id: 120314, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1204) { //自動車・オートバイ > 自動車アクセサリー
                tmp_grandChildren = [
                {id: 120401, name: '車内アクセサリー'},
                {id: 120402, name: 'カーナビ'},
                {id: 120403, name: 'カーオーディオ'},
                {id: 120404, name: '車外アクセサリー'},
                {id: 120405, name: 'メンテナンス用品'},
                {id: 120406, name: 'チャイルドシート'},
                {id: 120407, name: 'ドライブレコーダー'},
                {id: 120408, name: 'レーダー探知機'},
                {id: 120409, name: 'カタログ/マニュアル'},
                {id: 120410, name: 'セキュリティ'},
                {id: 120411, name: 'ETC'},
                {id: 120412, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1205) { //自動車・オートバイ > オートバイ車体
                tmp_grandChildren = [
                {id: 120501, name: 'すべて'},
                ]
            }else if (this.CategoryChildren == 1206) { //自動車・オートバイ > オートバイパーツ
                tmp_grandChildren = [
                {id: 120601, name: 'タイヤ'},
                {id: 120602, name: 'マフラー'},
                {id: 120603, name: 'エンジン、冷却装置'},
                {id: 120604, name: 'カウル、フェンダー、外装'},
                {id: 120605, name: 'サスペンション'},
                {id: 120606, name: 'ホイール'},
                {id: 120607, name: 'シート'},
                {id: 120608, name: 'ブレーキ'},
                {id: 120609, name: 'タンク'},
                {id: 120610, name: 'ライト、ウィンカー'},
                {id: 120611, name: 'チェーン、スプロケット、駆動系'},
                {id: 120612, name: 'メーター'},
                {id: 120613, name: '電装系'},
                {id: 120614, name: 'ミラー'},
                {id: 120615, name: '外国オートバイ用パーツ'},
                {id: 120616, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1207) { //自動車・オートバイ > オートバイアクセサリー
                tmp_grandChildren = [
                {id: 120701, name: 'ヘルメット/シールド'},
                {id: 120702, name: 'バイクウエア/装備'},
                {id: 120703, name: 'アクセサリー'},
                {id: 120704, name: 'メンテナンス'},
                {id: 120705, name: 'カタログ/マニュアル'},
                {id: 120706, name: 'その他'},
                ]

            //その他 
            }else if (this.CategoryChildren == 1301) { //その他 > ペット用品
                tmp_grandChildren = [
                {id: 130101, name: 'ペットフード'},
                {id: 130101, name: '犬用品'},
                {id: 130101, name: '猫用品'},
                {id: 130101, name: '魚用品/水草'},
                {id: 130101, name: '小動物用品'},
                {id: 130101, name: '爬虫類/両生類用品'},
                {id: 130101, name: 'かご/おり'},
                {id: 130101, name: '鳥用品'},
                {id: 130101, name: '虫類用品'},
                {id: 130101, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1302) { //その他 > 食品
                tmp_grandChildren = [
                {id: 130201, name: '菓子'},
                {id: 130201, name: '米'},
                {id: 130201, name: '野菜'},
                {id: 130201, name: '果物'},
                {id: 130201, name: '調味料'},
                {id: 130201, name: '魚介類(加工食品)'},
                {id: 130201, name: '肉類(加工食品)'},
                {id: 130201, name: 'その他 加工食品'},
                {id: 130201, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1303) { //その他 > 飲料/酒
                tmp_grandChildren = [
                {id: 130301, name: 'コーヒー'},
                {id: 130301, name: 'ソフトドリンク'},
                {id: 130301, name: 'ミネラルウォーター'},
                {id: 130301, name: '茶'},
                {id: 130301, name: 'ウイスキー'},
                {id: 130301, name: 'ワイン'},
                {id: 130301, name: 'ブランデー'},
                {id: 130301, name: '焼酎'},
                {id: 130301, name: '日本酒'},
                {id: 130301, name: 'ビール、発泡酒'},
                {id: 130301, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1304) { //その他 > 日用品/生活雑貨/旅行
                tmp_grandChildren = [
                {id: 130401, name: 'タオル/バス用品'},
                {id: 130401, name: '日用品/生活雑貨'},
                {id: 130401, name: '洗剤/柔軟剤'},
                {id: 130401, name: '旅行用品'},
                {id: 130401, name: '防災関連グッズ'},
                {id: 130401, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1305) { //その他 > アンティーク/コレクション
                tmp_grandChildren = [
                {id: 130501, name: '雑貨'},
                {id: 130501, name: '工芸品'},
                {id: 130501, name: '家具'},
                {id: 130501, name: '印刷物'},
                {id: 130501, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1306) { //その他 > 文房具/事務用品
                tmp_grandChildren = [
                {id: 130601, name: '筆記具'},
                {id: 130601, name: 'ノート/メモ帳'},
                {id: 130601, name: 'テープ/マスキングテープ'},
                {id: 130601, name: 'カレンダー/スケジュール'},
                {id: 130601, name: 'アルバム/スクラップ'},
                {id: 130601, name: 'ファイル/バインダー'},
                {id: 130601, name: 'はさみ/カッター'},
                {id: 130601, name: 'カードホルダー/名刺管理'},
                {id: 130601, name: 'のり/ホッチキス'},
                {id: 130601, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1307) { //その他 > 事務/店舗用品
                tmp_grandChildren = [
                {id: 130701, name: 'オフィス用品一般'},
                {id: 130701, name: 'オフィス家具'},
                {id: 130701, name: '店舗用品'},
                {id: 130701, name: 'OA機器'},
                {id: 130701, name: 'ラッピング/包装'},
                {id: 130701, name: 'その他'},
                ]
            }else if (this.CategoryChildren == 1308) { //その他 > その他
                tmp_grandChildren = [
                {id: 130801, name: 'すべて'},
                ]
            }else {
                alert('カテゴリーを選択してください')
            }
            this.grandChildren = tmp_grandChildren;
            this.showGrandChildren=true;
        }
    },
    mounted() {
        if (this.category_id != null){
            this.Category = this.category_id
            this.fetchChild()
            this.showChildren = true

            if (this.category_id && this.category_children_id != null) {
                this.CategoryChildren = this.category_children_id
                this.fetchGrandChild()
                this.showGrandChildren = true
                
                if(this.category_id && this.category_children_id && this.category_grand_children_id != null) {
                this.CategoryGrandChildren = this.category_grand_children_id

                }
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.require-content {
    height: 18px;
    line-height: 18px;
    background-color: red;
    border-radius: 4px;
    margin-left: 5px;
    padding: 0px 3px;
    margin-bottom: 2px;
    .require {
        color: white;
        font-size: 0.5rem;
    }
}
.category-group {
    list-style: none;
    padding: 0;
}
.select-box {
    margin-bottom: 15px;
}
</style>