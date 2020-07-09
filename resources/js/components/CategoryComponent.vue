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
            <li class="select-box">
                <select id="category" name="category_id" required class="form-control" v-model="Category" @change="fetchChild">
                    <option value="">選択してください</option>
                    <option v-for="(category, index) in categories" :value="category.id" :key="index">
                        {{ category.name }}
                        {{ category.id }}
                    </option>
                </select>
            </li>
        <!-- -カテゴリー親 - -->
            <li class="select-box">
                <select id="category" name="category-children" required class="form-control" v-show="showChildren" v-model="CategoryChildren" @change="fetchGrandChild">
                    <option value="">選択してください</option>
                    <option v-for="(child, index) in children" v-bind:value="child.id" :key="index">
                        {{ child.name }}
                    </option>
                </select>
            </li>
        <!-- -カテゴリー親 - -->
            <li class="select-box">
                <select id="category" name="category-grand-children" class="form-control" v-show="showGrandChildren"  v-model="CategoryGrandChildren">
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
    data() {
        return {
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
                {id: 508, name: 'その他'},
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
                {id: 910, name: 'アウトドア'},
                {id: 910, name: 'その他'},
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
                {id: 1201, name: '自動車タイヤ/ホイール'},
                {id: 1201, name: '自動車パーツ'},
                {id: 1201, name: '自動車アクセサリー'},
                {id: 1201, name: 'オートバイ車体'},
                {id: 1201, name: 'オートバイパーツ'},
                {id: 1201, name: 'オートバイアクセサリー'},
                ]      
            }else if (this.Category == 13) { //その他
                tmp_children = [
                {id: 1301, name: 'ペット用品'},
                {id: 1301, name: '食品'},
                {id: 1301, name: '飲料/酒'},
                {id: 1301, name: '日用品/生活雑貨/旅行'},
                {id: 1301, name: 'アンティーク/コレクション'},
                {id: 1301, name: '文房具/事務用品'},
                {id: 1301, name: '事務/店舗用品'},
                {id: 1301, name: 'その他'},
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
                {id: 10201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 103) { //レディース > パンツ
                tmp_grandChildren = [
                {id: 10301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 104) { //レディース > スカート
                tmp_grandChildren = [
                {id: 10401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 105) { //レディース > ワンピース
                tmp_grandChildren = [
                {id: 10501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 106) { //レディース > 靴
                tmp_grandChildren = [
                {id: 10601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 107) { //レディース > ルームウェア/パジャマ
                tmp_grandChildren = [
                {id: 10701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 108) { //レディース > レッグエェア
                tmp_grandChildren = [
                {id: 10801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 109) { //レディース > 帽子
                tmp_grandChildren = [
                {id: 10901, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 110) { //レディース > バッグ
                tmp_grandChildren = [
                {id: 11001, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 111) { //レディース > アクセサリー
                tmp_grandChildren = [
                {id: 11101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 112) { //レディース > ヘアアクセサリー
                tmp_grandChildren = [
                {id: 11201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 113) { //レディース > 小物
                tmp_grandChildren = [
                {id: 11301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 114) { //レディース > 時計
                tmp_grandChildren = [
                {id: 11401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 115) { //レディース > ウィッグ/エステ
                tmp_grandChildren = [
                {id: 11501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 116) { //レディース > 浴衣/水着
                tmp_grandChildren = [
                {id: 11601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 117) { //レディース > スーツ/フォーマル/ドレス
                tmp_grandChildren = [
                {id: 11701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 118) { //レディース > マタニティ
                tmp_grandChildren = [
                {id: 11801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 119) { //レディース > その他
                tmp_grandChildren = [
                {id: 11901, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 201) { //メンズ > トップス
                tmp_grandChildren = [
                {id: 20101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 202) { //メンズ > ジャケット/アウター
                tmp_grandChildren = [
                {id: 20201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 203) { //メンズ > パンツ
                tmp_grandChildren = [
                {id: 20301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 204) { //メンズ > 靴
                tmp_grandChildren = [
                {id: 20401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 205) { //メンズ > バッグ
                tmp_grandChildren = [
                {id: 20501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 206) { //メンズ > スーツ
                tmp_grandChildren = [
                {id: 20601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 207) { //メンズ > 帽子
                tmp_grandChildren = [
                {id: 20701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 208) { //メンズ > アクセサリー
                tmp_grandChildren = [
                {id: 20801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 209) { //メンズ > 小物
                tmp_grandChildren = [
                {id: 20901, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 210) { //メンズ > 時計
                tmp_grandChildren = [
                {id: 21001, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 211) { //メンズ > 水着
                tmp_grandChildren = [
                {id: 21101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 212) { //メンズ > レッグウェア
                tmp_grandChildren = [
                {id: 21201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 213) { //メンズ > アンダーウェア
                tmp_grandChildren = [
                {id: 21301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 214) { //メンズ > その他
                tmp_grandChildren = [
                {id: 20101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 301) { //ベビー・キッズ > ベビー服(男の子用)
                tmp_grandChildren = [
                {id: 30101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 302) { //ベビー・キッズ > ベビー服(女の子用)
                tmp_grandChildren = [
                {id: 30201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 303) { //ベビー・キッズ > 子ども用ファッション小物
                tmp_grandChildren = [
                {id: 30301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 304) { //ベビー・キッズ > 外出/移動用品
                tmp_grandChildren = [
                {id: 30401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 305) { //ベビー・キッズ > 授乳/食事
                tmp_grandChildren = [
                {id: 30501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 306) { //ベビー・キッズ > ベビー家具/寝具/室内用品
                tmp_grandChildren = [
                {id: 30601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 307) { //ベビー・キッズ > おもちゃ
                tmp_grandChildren = [
                {id: 30701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 308) { //ベビー・キッズ > 行事/記念品
                tmp_grandChildren = [
                {id: 30801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 309) { //ベビー・キッズ > その他
                tmp_grandChildren = [
                {id: 30901, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 401) { //インテリア・住まい・小物 > キッチン/食器
                tmp_grandChildren = [
                {id: 40101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 402) { //インテリア・住まい・小物 > ベッド/マットレス
                tmp_grandChildren = [
                {id: 40201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 403) { //インテリア・住まい・小物 > ソファ/ソファベッド
                tmp_grandChildren = [
                {id: 40301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 404) { //インテリア・住まい・小物 > 椅子/チェア
                tmp_grandChildren = [
                {id: 40401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 405) { //インテリア・住まい・小物 > 机/テーブル
                tmp_grandChildren = [
                {id: 40501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 406) { //インテリア・住まい・小物 > 収納家具
                tmp_grandChildren = [
                {id: 40601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 407) { //インテリア・住まい・小物 > ラグ/カーペット/マット
                tmp_grandChildren = [
                {id: 40701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 408) { //インテリア・住まい・小物 > カーテン/ブラインド
                tmp_grandChildren = [
                {id: 40801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 409) { //インテリア・住まい・小物 > ライト/照明
                tmp_grandChildren = [
                {id: 40901, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 410) { //インテリア・住まい・小物 > 寝具
                tmp_grandChildren = [
                {id: 41001, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 411) { //インテリア・住まい・小物 > インテリア小物
                tmp_grandChildren = [
                {id: 41101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 412) { //インテリア・住まい・小物 > 季節/年中行事
                tmp_grandChildren = [
                {id: 41201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 413) { //インテリア・住まい・小物 > その他
                tmp_grandChildren = [
                {id: 41301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 501) { //本・音楽・ゲーム > 本
                tmp_grandChildren = [
                {id: 50101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 502) { //本・音楽・ゲーム > 漫画
                tmp_grandChildren = [
                {id: 50201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 503) { //本・音楽・ゲーム > 雑誌
                tmp_grandChildren = [
                {id: 50301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 504) { //本・音楽・ゲーム > CD
                tmp_grandChildren = [
                {id: 50401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 505) { //本・音楽・ゲーム > DVD/ブルーレイ
                tmp_grandChildren = [
                {id: 50501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 506) { //本・音楽・ゲーム > レコード
                tmp_grandChildren = [
                {id: 50601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 507) { //本・音楽・ゲーム > テレビゲーム
                tmp_grandChildren = [
                {id: 50701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 508) { //本・音楽・ゲーム > その他
                tmp_grandChildren = [
                {id: 50801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 601) { //おもちゃ・ホビー・グッズ > おもちゃ
                tmp_grandChildren = [
                {id: 60101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 602) { //おもちゃ・ホビー・グッズ > タレントグッズ
                tmp_grandChildren = [
                {id: 60201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 603) { //おもちゃ・ホビー・グッズ > コミック/アニメグッズ
                tmp_grandChildren = [
                {id: 60301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 604) { //おもちゃ・ホビー・グッズ > トレーディングカード
                tmp_grandChildren = [
                {id: 60401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 605) { //おもちゃ・ホビー・グッズ > フィギュア
                tmp_grandChildren = [
                {id: 60501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 606) { //おもちゃ・ホビー・グッズ > 楽器/器材
                tmp_grandChildren = [
                {id: 60601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 607) { //おもちゃ・ホビー・グッズ > コレクション
                tmp_grandChildren = [
                {id: 60701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 608) { //おもちゃ・ホビー・グッズ > ミリタリー
                tmp_grandChildren = [
                {id: 60801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 609) { //おもちゃ・ホビー・グッズ > 美術品
                tmp_grandChildren = [
                {id: 60901, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 610) { //おもちゃ・ホビー・グッズ > アート用品
                tmp_grandChildren = [
                {id: 61001, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 611) { //おもちゃ・ホビー・グッズ > その他
                tmp_grandChildren = [
                {id: 61101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 701) { //コスメ・香水・美容 > ベースメイク
                tmp_grandChildren = [
                {id: 70101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 702) { //コスメ・香水・美容 > メイクアップ
                tmp_grandChildren = [
                {id: 70201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 703) { //コスメ・香水・美容 > ネイルケア
                tmp_grandChildren = [
                {id: 70301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 704) { //コスメ・香水・美容 > 香水
                tmp_grandChildren = [
                {id: 70401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 705) { //コスメ・香水・美容 > スキンケア/基礎化粧品
                tmp_grandChildren = [
                {id: 70501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 706) { //コスメ・香水・美容 > ヘアケア
                tmp_grandChildren = [
                {id: 70601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 707) { //コスメ・香水・美容 > ボディケア
                tmp_grandChildren = [
                {id: 70701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 708) { //コスメ・香水・美容 > オーラルケア
                tmp_grandChildren = [
                {id: 70801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 709) { //コスメ・香水・美容 > リラクゼーション
                tmp_grandChildren = [
                {id: 70901, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 710) { //コスメ・香水・美容 > ダイエット
                tmp_grandChildren = [
                {id: 71001, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 711) { //コスメ・香水・美容 > その他
                tmp_grandChildren = [
                {id: 71101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 801) { //家電・スマホ・カメラ > スマートフォン/携帯電話
                tmp_grandChildren = [
                {id: 80101, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 802) { //家電・スマホ・カメラ > スマホアクセサリー
                tmp_grandChildren = [
                {id: 80201, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 803) { //家電・スマホ・カメラ > PC/タブレット
                tmp_grandChildren = [
                {id: 80301, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 804) { //家電・スマホ・カメラ > カメラ
                tmp_grandChildren = [
                {id: 80401, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 805) { //家電・スマホ・カメラ > テレビ/映像機器
                tmp_grandChildren = [
                {id: 80501, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 806) { //家電・スマホ・カメラ > オーディオ機器
                tmp_grandChildren = [
                {id: 80601, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 807) { //家電・スマホ・カメラ > 美容/健康
                tmp_grandChildren = [
                {id: 80701, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 808) { //家電・スマホ・カメラ > 冷暖房/空調
                tmp_grandChildren = [
                {id: 80801, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 809) { //家電・スマホ・カメラ > 生活家電
                tmp_grandChildren = [
                {id: 80901, name: 'トップス'},
                ]
            }else if (this.CategoryChildren == 810) { //家電・スマホ・カメラ > その他
                tmp_grandChildren = [
                {id: 81001, name: 'トップス'},
                ]
            }
            
            
            
            
            
            
            
            
            
            
            else {
                alert('カテゴリーを選択してください')
            }
            this.grandChildren = tmp_grandChildren;
            this.showGrandChildren=true;
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