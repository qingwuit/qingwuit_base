<template>
    <div class="login_bg seller_login">
        <div class="login_bg3">
            <div class="login_bg2">
                <div class="login_hg_left">
                    <!-- <img :src="require('@/asset/login/login_bg.png')" > -->
                </div>
                <div class="login_black_hg">
                    <div class="seller_logo">
                        <img :src="require('@/asset/login/login_logo.png')" alt="">
                    </div>
                    <div class="head_log">
                        后台管理系统
                        <p>ELECTRICITY SYSTEM</p>
                    </div>
                    <div class="unline" style="margin-bottom:30px;"></div>
                    <div class="form-group">
                        <a-input v-model="username" @keyup.enter="login"  placeholder="账号" size="large"><a-icon style="font-size:16px;" slot="prefix" type="user"  /></a-input>
                    </div>
                    <div class="form-group"  >
                        <a-input-password v-model="password" type="password" @keyup.enter="login"  placeholder="密码" size="large"><a-icon style="font-size:16px;" slot="prefix" type="lock" /></a-input-password>
                    </div>
               
                    <!-- <div class="form-group" style="font-size:12px;">
                        <a-checkbox name="isCheck" v-model="isCheck" label="1">
                            <font style="font-size:12px;">我已同意</font>
                        </a-checkbox>
                        <a class="must_rad" href="#">《系统用户使用协议》</a>（必读）
                    </div> -->
                    
                    <div class="form-group">
                        <a-button type="primary" block  @click="login" size="large">登 陆</a-button>
                    </div>

                  
                   
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    name: "login",
    data() {
        return {
            username: "",
            password: "",
            isCheck: true
        };
    },
    methods: {
        // 登录
        login: function() {
            // 重新赋值vm使 axios可用vue实例
            var vm = this;
            if (!this.isCheck) {
                this.$message.error("请先认真阅读本站协议！");
                return;
            }

            if (this.username == "" || this.password == "") {
                this.$message.error("用户名和密码不能为空！");
                return;
            }

            this.$post(this.$api.adminLogin, {
                username: this.username,
                password: this.password
            }).then(function(res) {
                if (res.code == 200) {
                    // console.log(res);
                    // 存储用户的token
                    localStorage.setItem("admin_token", res.data.token);
                    vm.$message.success('登录成功！');
                    vm.$router.push({ name: "admin_default" });
                }else{
                    vm.$message.error(res.msg);
                }
            });
        }
    },
    created: function() {
        var _this = this;
        // 判断token是否失效
        this.$get(this.$api.adminCheckLogin).then(function(res) {
            // console.log(res);
            if (res.code == 200) {
                _this.$router.push({ name: "admin_default" });
            }
        });
    }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.seller_logo{
    width: 108px;
    height: 108px;
    margin:0 auto;
    margin-bottom: 30px;
    border-radius: 50%;
    background: #eee;
}
.login_bg {
    background-position: center;
    background-size: 100%;
    height: 100%;
    background-color: #f1f1f1;
    /* background-image: linear-gradient(to right, #5d80fe , #56c9ff); */
}
.head_log{
    text-align: center;
    line-height: 20px;
    font-size: 30px;
}
.head_log p{
    color:#666;
    line-height: 40px;
    font-size: 12px;
    margin-bottom: 10px;
}
.login_bg2{
    position: relative;
    top: 50%;
    width: 1000px;
    margin: 0 auto;
    /* margin-top: -250px; */
    display: block;
}


.login_bg3{
    height: 100%;
    background: url('../../asset/login/back.png');
    background-position: top right;
    background-repeat: no-repeat;
    
}
.login_bg2:after{
    display: block;
    content:'';
    clear: both;
}
.login_black_hg {
    background: #fff;
    width: 500px;
    border-radius: 6px;
    padding: 0px 40px 20px 40px;
    box-sizing: border-box;
    -moz-box-sizing: border-box; /* Firefox */
    -webkit-box-sizing: border-box; /* Safari */
    padding-top: 40px;
    /* float: left; */
    position: absolute;
    left: 50%;
    /* right: 30px; */
    margin-left: -200px;
    top:-480px;
}
.login_hg_left{
    float: left;
    position: absolute;
    left: -180px;
    top:-390px;
    
}
.login_input {
    margin: 20px 0 20px 0;
}

.login_btn {
    margin-top: 20px;
    width: 100%;
    font-size: 14px;
}
.form-group{
    margin-bottom: 20px;
}
.must_rad {
    font-size: 12px;
}

@media screen and  (max-width:960px){
.login_bg2{
    width: 100%;
}
.login_hg_left{display: none;}
.login_black_hg{right:auto;left:50%;margin-left: -180px;width: 360px;top:-280px;}
} 
</style>

