<template>
    <div class="qingwu">
        <div class="admin_table_page_title">接口分组</div>
        <div class="unline underm"></div>

        <div class="admin_table_handle_btn">
            <a-button @click="$router.push('/Admin/permission_groups/form')" type="primary" icon="plus">添加</a-button>
            <a-button class="admin_delete_btn" type="danger" icon="delete" @click="del">批量删除</a-button>
        </div>
        <div class="admin_table_list">
            <a-table :columns="columns" :data-source="list" :pagination="false" :row-selection="{ selectedRowKeys: selectedRowKeys, onChange: onSelectChange }" row-key="id">
                <span slot="apis" slot-scope="rows">
                    <a-tag color="#108ee9" :title="v.apis" style="margin-bottom:10px;" v-for="(v,k) in rows.permissions" :key="k">{{v.name||'-'}}</a-tag>
                </span>
                <span slot="action" slot-scope="rows">
                    <a-button icon="plus" @click="batchApi(rows.id)">添加接口</a-button>
                    <a-button icon="edit" @click="$router.push('/Admin/permission_groups/form/'+rows.id)">编辑</a-button>
                </span>
            </a-table>
            <div class="admin_pagination" v-if="total>0">
                <a-pagination v-model="params.page" :page-size.sync="params.per_page" :total="total" @change="onChange" show-less-items />
            </div>
        </div>

        <a-modal title="批量添加接口" :visible="visible" :confirm-loading="confirmLoading"  @ok="handleOk" @cancel="visible=false">
            <a-select mode="multiple" :value="choseList" style="width: 100%" placeholder="接口名称" @change="handleChange" option-filter-prop="children" :filter-option="filterOption">
                <a-select-option v-for="(v,k) in routeList" :key="k" :value="k">{{v.Interface_name}}</a-select-option>
            </a-select>
        </a-modal>
    </div>
</template>

<script>
export default {
    components: {},
    props: {},
    data() {
      return {
          params:{
              page:1,
              per_page:30,
          },
          total:0, //总页数
          selectedRowKeys:[], // 被选择的行
          columns:[
              {title:'#',dataIndex:'id',fixed:'left'},
              {title:'接口分组',dataIndex:'name'},
              {title:'接口列表',key:'id',scopedSlots: { customRender: 'apis' }},
              {title:'操作',key:'id',fixed:'right',scopedSlots: { customRender: 'action' }},
          ],
          list:[],
          routeList:[],
          visible:false,
          confirmLoading:false,
          pid:0,
          choseList:[],
      };
    },
    watch: {},
    computed: {},
    methods: {
        // 选择框被点击
        onSelectChange(selectedRowKeys) {
            this.selectedRowKeys = selectedRowKeys;
        },
        // 选择分页
        onChange(e){
            this.params.page = e;
        },
        // 删除
        del(){
            if(this.selectedRowKeys.length==0){
                return this.$message.error('未选择数据.');
            }
            this.$confirm({
                title: '你确定要删除选择的数据？',
                content: '确定删除后无法恢复.',
                okText: '是',
                okType: 'danger',
                cancelText: '取消',
                onOk:()=> {
                    let ids = this.selectedRowKeys.join(',');
                    this.$delete(this.$api.adminPermissionGroups+'/'+ids).then(res=>{
                        if(res.code == 200){
                            this.onload();
                            this.$message.success('删除成功');
                        }else{
                            this.$message.error(res.msg)
                        }
                    });
                    
                },
            });
        },
        batchApi(id){
            this.pid = id;
            this.visible = true;
            this.confirmLoading = false;
        },
        filterOption(input, option){
            return (
                option.componentOptions.children[0].text.toLowerCase().indexOf(input.toLowerCase()) >= 0
            );
        },
        handleOk(){
            let info = [];
            this.choseList.forEach(item=>{
                info.push({pid:this.pid,name:this.routeList[item].Interface_name,apis:this.routeList[item].as})
            })
            this.addApis({batch:info})
        },
        addApis(e){
            this.confirmLoading = true;
            this.$post(this.$api.adminPermissions,e).then(res=>{
                if(res.code == 200){
                    this.confirmLoading = false;
                    this.visible = false;
                    this.choseList = [];
                    this.onload();
                    this.$message.success(res.msg)
                }else{
                    return this.$message.error(res.msg)
                }
            })
        },
        handleChange(e){
            this.choseList = e;
        },
        onload(){
            this.$get(this.$api.adminPermissions,{batch:true}).then(res=>{
                this.routeList = res.data;
            });
            this.$get(this.$api.adminPermissionGroups,this.params).then(res=>{
                this.total = res.data.total;
                this.list = res.data.data;
            });
        },
    },
    created() {
        this.onload();
    },
    mounted() {}
};
</script>
<style lang="scss" scoped>

</style>