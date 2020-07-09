<template>
    <div class="container">
        <div class="form-row">
        <!-- -カテゴリー親 - -->
            <div class="form-group">
                <label for="category" class="d-flex align-items-end">
                    <p class="font-weight-bold mb-0">カテゴリー</p>
                    <div class="require-content">
                        <p class="require font-weight-bold">必須</p>
                    </div>
                </label>
            </div>
        </div>
    </div>
</template>

<script>

export default {

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
</style>