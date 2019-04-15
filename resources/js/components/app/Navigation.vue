<template>
    <el-row :gutter="20">
        <el-col :span="20" :offset="2">
            <el-menu
                default-active="1"
                class="el-menu-demo"
                mode="horizontal"
                background-color="#545c64"
                text-color="#fff"
                active-text-color="#ffd04b"
            >
                <el-menu-item index="1">Todo's App</el-menu-item>
            </el-menu>
        </el-col>
    </el-row>
</template>

<script>
    export default {
        name: "Navigation"
    }
</script>

<style scoped>

</style>
