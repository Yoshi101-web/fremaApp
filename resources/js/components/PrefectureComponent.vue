<template>
    <div class="form-row">
        <div class="form-group mt-2">
            <label for="prefecture_id" class="d-flex align-items-end">
                <p class="font-weight-bold mb-0">配送元の地域</p>
                <div class="require-content">
                    <p class="require font-weight-bold">必須</p>
                </div>
            </label>
            <select id="prefecture_id" name="prefecture_id" v-model="prefecture_value" class="form-control">
                <option value="">選択してください</option>
                <option v-for="(area,index) in prefecture" :value="area.id" :key="index">
                    {{ area.name }}
                </option>
            </select>
        </div>
    </div>
</template>


<script>
export default {
    props: [
        'prefecture_id'
    ],
    data() {

        return{ 
            prefecture_value: '',
            prefecture: [
                {id: 1, name: '北海道'}, 
                {id: 2, name: '青森県'}, 
                {id: 3, name: '岩手県'}, 
                {id: 4, name: '宮城県'},
                {id: 5, name: '秋田県'},
                {id: 6, name: '山形県'}, 
                {id: 7, name: '福島県'}, 
                {id: 8, name: '茨城県'},
                {id: 9, name: '栃木県'}, 
                {id: 10, name: '群馬県'}, 
                {id: 11, name: '埼玉県'}, 
                {id: 12, name: '千葉県'},
                {id: 13, name: '東京都'}, 
                {id: 14, name: '神奈川県'}, 
                {id: 15, name: '新潟県'}, 
                {id: 16, name: '富山県'},
                {id: 17, name: '石川県'}, 
                {id: 18, name: '福井県'}, 
                {id: 19, name: '山梨県'}, 
                {id: 20, name: '長野県'}, 
                {id: 21, name: '岐阜県'}, 
                {id: 22, name: '静岡県'}, 
                {id: 23, name: '愛知県'}, 
                {id: 24, name: '三重県'},
                {id: 25, name: '滋賀県'}, 
                {id: 26, name: '京都府'}, 
                {id: 27, name: '大阪府'}, 
                {id: 28, name: '兵庫県'},
                {id: 29, name: '奈良県'}, 
                {id: 30, name: '和歌山県'}, 
                {id: 31, name: '鳥取県'}, 
                {id: 32, name: '島根県'},
                {id: 33, name: '岡山県'}, 
                {id: 34, name: '広島県'}, 
                {id: 35, name: '山口県'}, 
                {id: 36, name: '徳島県'},
                {id: 37, name: '香川県'},
                {id: 38, name: '愛媛県'},
                {id: 39, name: '高知県'}, 
                {id: 40, name: '福岡県'},
                {id: 41, name: '佐賀県'}, 
                {id: 42, name: '長崎県'}, 
                {id: 43, name: '熊本県'}, 
                {id: 44, name: '大分県'},
                {id: 45, name: '宮崎県'}, 
                {id: 46, name: '鹿児島県'}, 
                {id: 47, name: '沖縄県'},
            ]
        }
    },
    mounted() {
        if (this.prefecture_id != null) {
            this.prefecture_value = this.prefecture_id
        }
    }
}
</script>

<style lang="scss" scoped>
.form-group {
    width: 100%;
}

.require-content {
    width: 30px;
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
</style>