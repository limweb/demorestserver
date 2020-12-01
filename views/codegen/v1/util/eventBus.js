// created() {
// this.$bus.$on('message', this.onReceive);
// }
// ---- in methods () ----------
// this.$bus.$emit('message', this.text);


const EventBus = {
    data() {
        return {};
    },
    computed: {
        scrwidth() {
            return screen.width;
        },
        scrheight() {
            return screen.height;
        },
        wdwidth() {
            return window.innerHeight;
        },
        wdheight() {
            return window.innerWidth;
        },
        breakpoint() {
            if (window.innerWidth > 1280) {
                return 'xl';
            } else if (window.innerWidth > 1024) {
                return 'lg';
            } else if (window.innerWidth > 768) {
                return 'md';
            } else if (window.innerWidth > 640) {
                return 'sm';
            }
        },
        // canCrud() {
        //     if (this.$store.state.lot.rounds.length > 0 && this.$store.state.lot.selectround != '') {
        //         let r = this.$store.state.lot.rounds.find(r => r.id == this.$store.state.lot.selectround);
        //         if (r != undefined) {
        //             return r.close;
        //         } else {
        //             return false;
        //         }
        //     } else {
        //         return false;
        //     }
        // }
    },
    methods: {
        // renderNumber(num) {
        //     if ((num == null) | isNaN(num)) {
        //         console.log("num is nul or nan =", num);
        //         return 0;
        //     } else {
        //         return Number(num).toLocaleString("th-TH", {
        //             minimumFractionDigits: 2
        //         });
        //     }
        // },
        // currencyFormat(num) {
        //     return '$' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        // },
        // error(err) {
        //     var errorMessage = "";
        //     if (err.response != null && err.response.data.message) {
        //         errorMessage = err.response.data.message;
        //     } else {
        //         errorMessage = err.message;
        //     }
        //     setTimeout(() => {
        //         alert("Fail:" + errorMessage);
        //     }, 500);
        // },
        // chkstatus(obj) {
        //     if (obj.status == '404') {
        //         alert("Fail: " + obj.message);
        //     }
        // },
        // typeobjs() {
        //     this.$axios.get('/api/v1/typeobjs')
        //         .then((rs) => {
        //             console.log(rs);
        //             this.$store.state.lot.typeobjs = rs.data.datas;
        //         })
        //         .catch((err) => {
        //             console.log(err);
        //         });
        // },
        // types() {
        //     this.$axios.get('/api/v1/types')
        //         .then((rs) => {
        //             console.log(rs);
        //             this.$store.state.lot.types = rs.data.datas;
        //         })
        //         .catch((err) => {
        //             console.log(err);
        //         });
        // },
        // players() {
        //     this.$axios.get('/api/v1/players')
        //         .then((rs) => {
        //             console.log(rs);
        //             this.$store.state.lot.players = rs.data.datas;
        //         })
        //         .catch((err) => {
        //             console.log(err);
        //         });
        // },
        // roundsactive() {
        //     this.$axios.get('/api/v1/rounds/active')
        //         .then((rs) => {
        //             console.log(rs);
        //             this.$store.state.lot.rounds = rs.data.datas;
        //         })
        //         .catch((err) => {
        //             console.log(err);
        //         });
        // },
        // getlotsbyround() {
        //     this.$store.state.overlay = 1;
        //     let url = '/api/v1/rep/lotsbyroundid/' + this.$store.state.lot.selectround;
        //     console.log('--url--->', url);
        //     this.$axios.get(url)
        //         .then((rs) => {
        //             console.log('getlotsbyround--->', rs);
        //             this.$store.state.lot.lotsumarys = rs.data.datas.lotsummary;
        //             this.$store.state.lot.sums = rs.data.datas.sums;
        //             this.$store.state.lot.playersales = rs.data.datas.playersale;
        //             this.$store.state.lot.reward = rs.data.datas.round.rewards;
        //             setTimeout(()=>{ 
        //                 this.$store.state.overlay = 0;
        //                 console.log('----test--timeout----');
        //             },2000);
        //         })
        //         .catch((err) => {
        //             console.log(err);
        //             this.$store.state.overlay = 0;
        //         });
        // },
        // getplayersales() {
        //     this.$store.state.overlay = 1;
        //     let url = '/api/v1/rep/playersales/' + this.$store.state.lot.selectround;
        //     console.log('--url--->', url);
        //     this.$axios.get(url)
        //         .then((rs) => {
        //             console.log('playersales--->', rs);
        //             this.$store.state.lot.playersales = rs.data.datas.playersale;
        //             this.$store.state.overlay = 0;
        //         })
        //         .catch((err) => {
        //             this.$store.state.overlay = 0;
        //             console.log(err);
        //         });
        // },
        // login(username, password) {
        //     console.log('bf selectroune-->', this.$store.state.lot.selectround);
        //     this.$store.state.lot.selectround = '';
        //     let data = {
        //         username: username,
        //         password: password
        //     }

        //     this.$axios.post("/api/v1/login", JSON.stringify(data))
        //         .then((rs) => {
        //             console.log(rs);
        //             if (rs.data.success) {
        //                 this.$store.state.profile = rs.data.user;
        //                 this.$store.state.jaomer = rs.data.user.jaomer;
        //                 this.$ls.set('jaomer', rs.data.user.jaomer);
        //                 this.$ls.set('member', rs.data.user);
        //                 this.$ls.set('isLogin', rs.data.user, 1000 * 60 * 60 * 24 * 7);
        //                 this.$ls.set('token', rs.data.accesstoken.token);
        //                 this.$ls.set('pkey', rs.data.accesstoken.pubkey);
        //                 this.$R.updatetoken();
        //                 this.$axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$R.token;
        //                 console.log('token-->', this.$axios.defaults.headers.common['Authorization']);
        //                 this.$router.push('/home');
        //             } else {
        //                 if(rs.data.msg){
        //                     alert(rs.data.msg);
        //                 }
        //             }
        //         })
        //         .catch((err) => {
        //             console.log('error---',err);
        //             if(err.data.msg){
        //                 alert(err.data.msg);
        //             }
        //         });
        // },
        // //------------ LOTs -------------------------
        // lotdatasbyround() {
        //     if (this.$store.state.lot.selectround) {
        //         this.$store.state.overlay = 1;
        //         this.$axios.get('/api/v1/lots/' + this.$store.state.lot.selectround)
        //             .then((rs) => {
        //                 console.log('--getlotsbyround--->', rs);
        //                 this.$store.state.lot.lots = rs.data.datas;
        //                 this.$store.state.lot.logs = rs.data.logs;
        //                 this.$store.state.overlay = 0;
        //             })
        //             .catch((err) => {
        //                 console.log(err);
        //                 this.$store.state.overlay = 0;
        //             });
        //     }
        // },
        // savelots(data) {
        //     console.log('----save---data--->', data);
        //     this.$axios.post("/api/v1/lot/save", JSON.stringify(data))
        //         .then((rs) => {
        //             console.log('rs-->', rs);
        //             if (rs.data.success) {
        //                 this.$store.state.lot.lots = rs.data.datas.numbers;
        //                 this.$store.state.lot.logs = rs.data.logs;
        //                 this.$store.state.lot.lotlogid = rs.data.datas.lotlogid;
        //                 this.$store.state.lot.logplayerid = rs.data.datas.player_id;
        //             } else {
        //                 throw rs.data.msg;
        //             }
        //         })
        //         .catch((err) => {
        //             alert(err);
        //             console.log(err);
        //             return false;
        //         });
        // },
        // delbylotid($id) {
        //     if (this.canCrud) {
        //         let rs = (prompt("ต้องการจะลบรายการนี้ กรุณาพิมพ์  'Y' to accept", '') == 'Y');
        //         if (rs) {
        //             console.log('delete lot id--->', $id);
        //             let data = {
        //                 round: this.$store.state.lot.selectround,
        //                 lotid: $id,
        //                 playerid: this.$store.state.lot.logplayerid
        //             };
        //             this.$axios.post("/api/v1/lots/delid", JSON.stringify(data))
        //                 .then((rs) => {
        //                     console.log(rs);
        //                     this.$store.state.lot.lots = rs.data.datas;
        //                 })
        //                 .catch((err) => {
        //                     console.log(err);
        //                 });
        //         }
        //     } else {
        //         alert('งวดปิดแล้ว')
        //     }
        // },
        // delbylog($id) {
        //     if(this.canCrud){
        //         let rs = (prompt("ต้องการจะลบชุดนี้ กรุณาพิมพ์  'Y' to accept", '') == 'Y');
        //         if (rs) {
        //             console.log('delete-lotlgo id-->', $id);
        //             let data = {
        //                 round: this.$store.state.lot.selectround,
        //                 lotlogid: $id,
        //                 playerid: this.$store.state.lot.logplayerid,
        //             };
        //             this.$axios.post("/api/v1/lots/delbylotlogid", JSON.stringify(data))
        //                 .then((rs) => {
        //                     console.log(rs);
        //                     this.$store.state.lot.lots = rs.data.datas.lots;
        //                     this.$store.state.lot.logs = rs.data.datas.lotlogs;
        //                 })
        //                 .catch((err) => {
        //                     console.log(err);
        //                 });
        //         } 
        //     } else {
        //             alert('งวดปิดแล้ว');
        //     }
                
        // },
        // logplayer() {
        //     console.log(this.$store.state.lot.logplayerid);
        //     let data = {
        //         roundid: this.$store.state.lot.selectround,
        //         playerid: this.$store.state.lot.logplayerid
        //     }
        //     this.$axios.post("/api/v1/lots/logsbyroundplayer", JSON.stringify(data))
        //         .then((rs) => {
        //             console.log(rs);
        //             this.$store.state.lot.logs = rs.data.datas.logs;
        //             this.$store.state.lot.lots = rs.data.datas.lots;
        //         })
        //         .catch((err) => {
        //             console.log(err);
        //         });
        // },

        // //------------ Holds--------------------------
        // holds() {
        //     this.$axios.get('/api/v1/holds')
        //         .then((rs) => {
        //             console.log(rs);
        //             this.$store.state.lot.holds = rs.data.datas;
        //         })
        //         .catch((err) => {
        //             console.log(err);

        //         });
        // },
        // clearholds() {
        //     let rs = confirm(' คุณต้องการลบทุกรายการ อั้นออกหรือไม่ ?');
        //     if (rs) {
        //         this.$axios.get('/api/v1/holds/clearall')
        //             .then((rs) => {
        //                 console.log(rs);
        //                 this.$store.state.lot.holds = rs.data.datas;
        //             })
        //             .catch((err) => {
        //                 onsole.log(err);
        //             });
        //     }
        // },
        // savehold(hold) {
        //     if (hold.num) {
        //         this.$axios.post("/api/v1/hold/add", JSON.stringify(hold))
        //             .then((rs) => {
        //                 console.log(rs);
        //                 if (rs.data.status == 1) {
        //                     this.$store.state.lot.holds = rs.data.datas;
        //                     hold = Object.assign({}, hold);
        //                     hold.num = '';
        //                     return hold;
        //                 } else {
        //                     alert(rs.data.msg);
        //                 }
        //             })
        //             .catch((err) => {
        //                 console.log(err);
        //             });
        //     }
        // },
        // savetype(data) {
        //     this.$axios.post("/api/v1/type/update", JSON.stringify(data))
        //         .then((response) => {
        //             console.log(response);
        //             this.datas = response.data.datas;
        //             if (response.data.status == 1) {
        //                 alert('Successed!');
        //             } else {
        //                 alert('error');
        //             }
        //         })
        //         .catch((error) => {
        //             console.log(error);
        //         });
        // },
        // deletehold(id) {
        //     let rs = confirm(' คุณต้องการลบรายการอั้นนี้ ออกหรือไม่ ?');
        //     if (rs) {
        //         let url = '/api/v1/hold/delete/' + id;
        //         this.$axios.get(url)
        //             .then((rs) => {
        //                 console.log(rs);
        //                 this.holds = rs.data.datas;
        //             })
        //             .catch((err) => {
        //                 console.log(err);
        //             });
        //     }
        // },
    },
    created() {
        // console.log('---app--created--in eventbus---');
        // this.typeobjs();
        // this.types();
        // this.players();
        // this.roundsactive();
        // this.holds();
        // if (this.$R.token) {
        //     this.$axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$R.token;
        // }
    }
}

EventBus.fontsize = function(multiplier) {
    if (document.body.style.fontSize == "") {
        document.body.style.fontSize = "1.0em";
    }
    document.body.style.fontSize =
        parseFloat(document.body.style.fontSize) + multiplier * 0.2 + "em";
    console.log(multiplier);
};

export default EventBus;