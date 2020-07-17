<template>
    <div class="form-container">
    <!-- ---画像アップロード--- -->
        <div class="form-row">
            <div class="form-group">
                    <label for="image-uploader">
                        <div class="d-flex align-items-end mb-0">
                            <p class="mb-0 h6 font-weight-bold">商品画像</p>
                            <div class="require-content">
                                <p class="require font-weight-bold">必須</p>
                            </div>
                        </div>
                        <p class="mb-0 block">最大8枚までアップロードできます</p>
                    </label>
                    <div id="image-uploader" class="card-body pt-1 px-5 mb-3">
                        <label for="uploader-btn" class="drag-drop-content d d-flex align-items-center justify-content-center"
                        @dragenter="dragEnter"
                        @dragleave="dragLeave"
                        @dragover.prevent
                        @drop.prevent="dropAndSelectedFile"
                        :class="{drag: isDrag}"
                        >
                            <div class="dd-text-group">
                                <p class="mb-0 text-center user-select-none">ドラッグアンドドロップ</p>
                                <p class="mb-0 text-center user-select-none">またはクリックしてファイルをアップロード</p>
                                <input id="uploader-btn" name="files[]" type="file" multiple @change="dropAndSelectedFile" style="display: none;" >
                            </div>
                        </label>
                    </div>
                    <div class="container">
                        <ul class="row flex-wrap">
                            <li class="card" v-for="(image, index) in images" :key="index">
                                <div class="image-wrapper"><img class="h-100 img-thumbnail" v-show="images" :src="image.path" /></div>
                                <label for="delete-image" class="card-body my-0 btn bg-secondary">
                                    <p id="delete-image" class="text-center font-weight-bold text-light" @click="deleteFile(index)">削除</p>
                                </label>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    <!-- ---商品名--- -->
        <div class="form-row">  
            <div class="form-group">
                <label for="item_name" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">商品名</p>
                    <div class="require-content">
                        <p class="require font-weight-bold">必須</p>
                    </div>
                </label>
                <input id="item_name" type="text" class="form-control" name="item_name" v-model="item_name" placeholder="内容">
            </div>
        </div>
    <!-- ---商品の説明--- -->
        <div class="form-row">  
            <div class="form-group mt-2">
                <label for="description" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">商品の説明</p>
                    <div class="require-content">
                        <p class="require font-weight-bold">必須</p>
                    </div>
                </label>
                <textarea  id="description" name="description" v-model="description" class="w-100 form-control" rows="10" placeholder="商品の説明 :"></textarea>
            </div>
        </div>
    <!-- ---カテゴリー --- -->
        <CategoryComponent
        :category_id="category_id"
        :category_children_id="category_children_id"
        :category_grand_children_id="category_grand_children_id"
        ></CategoryComponent>
    <!-- ---ブランド--- -->
        <div class="form-row">  
            <div class="form-group mt-2">
                <label for="brand_name" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">ブランド</p>
                    <div class="optional-content">
                        <p class="optional font-weight-bold">任意</p>
                    </div>
                </label>
                <input id="brand_name" type="text" class="form-control" name="brand_name" v-model="brand_name" placeholder="ブランド">
            </div>
        </div>
    <!-- ---サイズ--- -->
        <div class="form-row">  
            <div class="form-group mt-2">
                <label for="size" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">サイズ</p>
                    <div class="optional-content">
                        <p class="optional font-weight-bold">任意</p>
                    </div>
                </label>
                <input id="size" type="text" class="form-control" name="size" v-model="size">
            </div>
        </div>
    <!-- ---商品の状態--- -->
        <div class="form-row">  
            <div class="form-group mt-2">
                <label for="condition" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">商品の状態</p>
                    <div class="require-content">
                        <p class="require font-weight-bold">必須</p>
                    </div>
                </label>
                <select id="condition" name="condition" v-model="condition" class="form-control">
                    <option value="">選択してください</option>
                    <option value="新品、未使用">新品、未使用</option>
                    <option value="未使用に近い">未使用に近い</option>
                    <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
                    <option value="やや傷や汚れあり">やや傷や汚れあり</option>
                    <option value="全体的に状態が悪い">全体的に状態が悪い</option>
                </select>
            </div>
        </div>
    <!-- ---配送料の負担--- -->
        <div class="form-row">  
            <div class="form-group mt-2">
                <label for="shipping_fee_payer" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">配送料の負担</p>
                    <div class="require-content">
                        <p class="require font-weight-bold">必須</p>
                    </div>
                </label>
                <select id="shipping_fee_payer" name="shipping_fee_payer" v-model="shipping_fee_payer" class="form-control">
                    <option value="">選択してください</option>
                    <option value="送料込み（出品者負担）">送料込み（出品者負担）</option>
                    <option value="着払い（購入者負担）">着払い（購入者負担）</option>
                </select>
            </div>
        </div>
    <!-- ---配送元の地域--- -->
        <PrefectureComponent
        :prefecture_id = prefecture_id
        ></PrefectureComponent>
    <!-- ---発送までの日数--- -->
        <div class="form-row">  
            <div class="form-group mt-2">
                <label for="shipping_days" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">発送までの日数</p>
                    <div class="require-content">
                        <p class="require font-weight-bold">必須</p>
                    </div>
                </label>
                <select id="shipping_days" name="shipping_days" v-model="shipping_days" class="form-control">
                    <option value="">選択してください</option>
                    <option value="１〜２日で発送">１〜２日で発送</option>
                    <option value="２〜３日で発送">２〜３日で発送</option>
                    <option value="４〜７日で発送">４〜７日で発送</option>
                </select>
            </div>
        </div>
    <!-- ---販売価格--- -->
        <div class="form-row">  
            <div class="form-group mt-2 d-flex justify-content-between">
                <label for="price" class="d-flex align-items-center">
                    <p class="font-weight-bold mb-0">販売価格 (¥300〜¥9,999,999)</p>
                    <div class="require-content">
                        <p class="require font-weight-bold">必須</p>
                    </div>
                </label>
                <p class="d-flex align-items-center"><span class="mr-1">¥</span><input type="number" id="price" name="price" v-model="price" class="form-control text-right
                " placeholder="0"></p>
                
            </div>
        </div>
        <div class="form-row justify-content-center">
            <button @click="filesUpload" type="submit" class="btn btn-primary btn-lg">出品する</button>
        </div>
    </div>
</template>

<script>
import CategoryComponent from './CategoryComponent'
import PrefectureComponent from './PrefectureComponent'
export default {
    components: {
        CategoryComponent,
        PrefectureComponent
    },
    props: [
        'old'
    ],
    data() {
        return {
            isDrag: false,
            images: [],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            item_name: this.old.item_name,
            description: this.old.description,
            category_id: this.old.category_id,
            category_children_id: this.old.category_children_id,
            category_grand_children_id: this.old.category_grand_children_id,
            brand_name: this.old.brand_name,
            price: this.old.price,
            size: this.old.size,
            condition: '',
            shipping_fee_payer: '',
            prefecture_id: this.old.prefecture_id,
            shipping_days: '',
        }
    },
    methods: {
        dragEnter() {
            this.isDrag = true;
            console.log('dragEnter');
        },
        dragLeave() {
            this.isDrag = false;
            console.log('dragLeave');
        },
        dragOver() {
            this.isDrag = true;
            console.log('dragOver');
        },
        dropAndSelectedFile() {
            //event.target.filesは、type=fileのボタンを押してアップロードされた画像。
            //event.dataTransfer.filesは、ドラッグ＆ドロップでインポートした画像。
            var fileList = event.target.files || event.dataTransfer.files //どっちでも大丈夫。
            this.fileForeach(fileList)
            for(var i=0; i<fileList.length; i++){
                this.DataTransfer.items.add(fileList[i]); //fileをDataTransferに代入。
            }
            this.isDrag = false;
            console.log(this.DataTransfer);
        },
        fileForeach(fileList) {
            if (!fileList.length) {
                return false
            }
            console.log('fileForeach');
            _.forEach(fileList, (image, index) => {
                this.createImage(image)
            })
        },
        createImage (image) {
            console.log('createImage');
            var reader = new FileReader()
            var formData = new FormData()
            formData.append('file', image)
            reader.onload = (e) => {
                var dataURI = e.target.result
                if (dataURI) {
                    this.images.push({name: image.name, size: image.size, type: image.type, path: dataURI})
                }
            }
            reader.readAsDataURL(image)
        },
        deleteFile(index) {
            this.images.splice(index, 1) //サムネール削除
            this.DataTransfer.items.remove(index) //画像削除
        },
        filesUpload() {
             var input = document.querySelectorAll('input[name="files[]"]'); //input[name="files[]"を取得
            //inputにDataTransfer.files（fileList）を代入。  input[0].filesは、FileListオブジェクトしか代入できない
            input[0].files = this.DataTransfer.files; 
        },
    },
    mounted() {
        window.ondrop = function(e) {
            e.preventDefault()
        }
        window.ondragover = function(e) {
            e.preventDefault();
        }
        // 画像をデータを持つためのオブジェクト
        //DataTransfer.filesにFileListを持っている。
        this.DataTransfer = new DataTransfer();

        console.log(this.DataTransfer)

        if (this.old.condition != null) {
            this.condition = this.old.condition
        }
        if (this.old.shipping_fee_payer != null) {
            this.shipping_fee_payer = this.old.shipping_fee_payer
        }
        if (this.old.shipping_days != null) {
            this.shipping_days = this.old.shipping_days
        }
    }
}
</script>

<style lang="scss" scoped>
.form-group {
    width: 100%;
}

.drag-drop-content {
    height: 200px;
    border: 5px dashed gray;
    cursor: pointer;
}
.drag {
    background-color: rgba(130, 180, 229,0.05);
    border: 5px dashed rgba(130, 180, 229,0.85);
    cursor: pointer;
    .dd-text-group {
        color: rgba(130, 180, 229,0.9);
    }
}

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

.optional-content {
    height: 18px;
    line-height: 18px;
    background-color: gray;
    border-radius: 4px;
    margin-left: 5px;
    padding: 0px 3px;
    margin-bottom: 2px;
    .optional {
        color: white;
        font-size: 0.5rem;
    }
}
.image-wrapper {
    width: 120px;
    height: 120px;
}
</style>