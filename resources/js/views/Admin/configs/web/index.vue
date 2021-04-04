<template>
    <div class="qingwu">
        <div class="admin_table_page_title">
            <a-button @click="$router.back()" class="float_right" icon="arrow-left">返回</a-button>
            网站配置
        </div>
        <div class="unline underm"></div>
        <div class="admin_form">
            <a-tabs :default-active-key="0" tab-position="left">
                <a-tab-pane :key="0" tab="网站配置">
                    <web-config></web-config>
                </a-tab-pane>
            </a-tabs>
            
            
        </div>
    </div>
</template>

<script>
import webConfig from "./web.vue"
export default {
    components: {webConfig},
};
</script>