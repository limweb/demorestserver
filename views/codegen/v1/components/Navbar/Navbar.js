export default {
template: `
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <div class="sidebar-content" style="min-height: calc(100vh - 50px);">
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="/global_assets/images/demo/users/face11.jpg" width="38"
                                height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">Victoria Baker</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item  nav-item-submenu">
                    <router-link to="/home" class="nav-link active ">
                        <i class="icon-home4"></i>
                        <span>
                            Home CRUD
                        </span>
                    </router-link>
                    <ul class="nav nav-group-sub" data-submenu-title="ซื้อ">
                        <li class="nav-item">
                            <router-link to="/home/add" class="nav-link ">
                                <i class="icon-home4"></i>
                                <span>
                                    Home Add
                                </span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/home/edit" class="nav-link ">
                                <i class="icon-home4"></i>
                                <span>
                                    Home Edit
                                </span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/home/del" class="nav-link ">
                                <i class="icon-home4"></i>
                                <span>
                                    Home Del
                                </span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/home/import" class="nav-link ">
                                <i class="icon-home4"></i>
                                <span>
                                    Home Import
                                </span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/home/export" class="nav-link ">
                                <i class="icon-home4"></i>
                                <span>
                                    Home Export
                                </span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/home/print" class="nav-link ">
                                <i class="icon-home4"></i>
                                <span>
                                    Home print
                                </span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/home/view" class="nav-link ">
                                <i class="icon-home4"></i>
                                <span>
                                    Home View
                                </span>
                            </router-link>
                        </li>
                    </ul>
                </li>

                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">ระบบ
                    บัญชี</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                    <i class="icon-stack"></i>
                    <span>ซื้อ</span>
                    <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="ซื้อ">
                        <li class="nav-item"><a href="#"class="nav-link">1. จ่ายเงินมัดจำ</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#"class="nav-link">2. ซื้อเงินสด</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">3. ใบสั่งซื้อ</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">4. ซื้อเงินเชื่อด</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">5. บันทึกค่าใช้จ่ายอื่น ๆ ๆ</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#"class="nav-link">6. รายละเอียดผู้จำหน่าย</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">7. รายละเอียดค่าใช้จ่ายอื่น ๆ </a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#"class="nav-link">8. คำนวณเจ้าหนี้ใหม่ </a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="icon-stack"></i>
                        <span>ขาย</span>
                        <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="ขาย">
                        <li class="nav-item"><a href="#"class="nav-link">1. รับเงินมัดจำ</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#"class="nav-link">2. ขายเงินสด</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">3. ใบสั่งขาย</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">4. ขายเงินเชื่อ</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">5. บันทึกรายได้อื่น ๆ </a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#"class="nav-link">6. รายละเอียดลูกค้า</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">7. รายละเอียดรายได้อื่น ๆ</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">8. รายละเอียดพนักงานขาย</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">9. ทะเบียนหมายเลขสินค้า</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#"class="nav-link">A. ใบเสนอราคา</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#"class="nav-link">B. คำนวณยอดลูกหนี้ใหม่</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                    <i class="icon-stack"></i>
                    <span>การเงิน</span>
                    <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                    <i class="icon-stack"></i>
                    <span>สินค้า</span>
                    <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="สินค้า">
                        <li class="nav-item nav-item-submenu"><a href="#"class="nav-link">1.
                            รายการประจำวันสินค้า </a>
                            <ul class="nav nav-group-sub" data-submenu-title="รายการประจำวันสินค้า">
                                <li class="nav-item nav-item-submenu"><a href="#"class="nav-link">1. จ่ายสินค้าภายใน</a>
                                    <ul class="nav nav-group-sub" data-submenu-title="ขาย">
                                    <li class="nav-item"><a href="#"class="nav-link">1. จ่ายสินค้าใช้ภายใน</a></li>
                                    <li class="nav-item"><a href="#"class="nav-link">2. จ่ายวัตถุดิบเพื่อผลิต</a></li>
                                    <li class="nav-item"><a href="#"class="nav-link">3. จ่ายสินค้าเป็นตัวอย่าง </a></li>
                                    <li class="nav-item"><a href="#"class="nav-link">4. ตัดสินค้าชำรุด</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item"><a href="#"class="nav-link">2. โอนยายระหว่างคลัง</a></li>
                                <li class="nav-item nav-item-submenu"><a href="#"class="nav-link">3. ปรับปรุงยอดสินค้า</a>
                                    <ul class="nav nav-group-sub" data-submenu-title="ขาย">
                                    <li class="nav-item"><a href="#"class="nav-link">1. ปรับปรุงเพิ่ม/ลดสินค้า</a></li>
                                    <li class="nav-item"><a href="#"class="nav-link">2. รับส/คสำเร็จรูปจากการผลิต</a></li>
                                    <li class="nav-item"><a href="#"class="nav-link">3. ปรับปรุงจากการตรวจนับ </a></li>
                                    </ul>
                                </li>
                                <li cclass="nav-item nav-item-submenu"><a href="#"class="nav-link">4. ปรับปรุงต้นทุนสินค้า</a>
                                    <ul class="nav nav-group-sub" data-submenu-title="ขาย">
                                    <li class="nav-item"><a href="#"class="nav-link">1. เพิ่ม/ลดต้นทุนสินค้า</a></li>
                                    <li class="nav-item"><a href="#"class="nav-link">2. ปรับค่าขนส่งสินค้า</a></li>
                                    <li class="nav-item"><a href="#"class="nav-link">3. ปรับปรุงค่าประกันภัย</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#"class="nav-link">2. รายละเอียดสินค้า</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">3. รายละเอียดสินค้าชุด</a></li>
                        <li class="nav-item"><a href="#"class="nav-link">4. รายละเอียดสินค้าบริการ</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="#"class="nav-link">5. ตารางราคาขาย</a></li>
                        <li class="nav-item nav-item-submenu"><a href="#"class="nav-link">6. รายการตรวจนับสินค้า</a>
                            <ul class="nav nav-group-sub" data-submenu-title="ขาย">
                                <li class="nav-item"><a href="#"class="nav-link">1. สร้างข้อมูลตรวจนับ</a></li>
                                <li class="nav-item"><a href="#"class="nav-link">2. พิมพ์แบบฟอร์มเพื่อตรวจนับ</a></li>
                                <li class="nav-item"><a href="#"class="nav-link">3. บันทึกปริมาณที่ตรวจนับได้</a></li>
                                    <ul class="nav nav-group-sub" data-submenu-title="ขาย">
                                    <li class="nav-item"><a href="#"class="nav-link">1. เรียงตามรหัสสินค้า</a></li>
                                    <li class="nav-item"><a href="#"class="nav-link">2. เรียนตามชั้นเก็บ+รหัสสินค้า </a></li>
                                    </ul>
                                <li class="nav-item"><a href="#"class="nav-link">4. พิมพ์รายงานหลังตรวจนับ</a></li>
                                <li class="nav-item"><a href="#"class="nav-link">5. พิมพ์รายงานผลต่างจากการตรวจนับ</a></li>
                                <li class="nav-item"><a href="#"class="nav-link">6. ปรับปรุงยอดสินค้าตามที่ตรวจนับ</a></li>
                                <li class="nav-item"><a href="#"class="nav-link">7. ปรับปรุงรายการตรวจนับ</a></li>
                                <li class="nav-item"><a href="#"class="nav-link">8. รายงานรายการตรวจนับ</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu"><a href="#"class="nav-link">7. ซ่อมแซมระบบสินค้า</a>
                            <ul class="nav nav-group-sub" data-submenu-title="ขาย">
                                <li class="nav-item"><a href="#"class="nav-link">1. พิมพ์รายงานตรวจยอดยกมา</a></li>
                                <li class="nav-item"><a href="#"class="nav-link">2. ปรับปรุงยอดยกมาตามข้อมูลล๊อต</a></li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item"><a href="#"class="nav-link">3. แก้ไขรายการต่าง ๆ ของสินค้า</a></li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item"><a href="#"class="nav-link">4. คำนวณยอดสะสม/คงเหลือ/ลงบัญชี</a></li>
                                <li class="nav-item"><a href="#"class="nav-link">5. คำนวณยอดสั่งซื้อ/สั่งขายใหม่่</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#"class="nav-link">8. กำหนดจุดสั่งซื้อ</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                    <i class="icon-stack"></i>
                    <span>บัญชี</span>
                    <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                    <i class="icon-stack"></i>
                    <span>รายงาน</span>
                    <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                    <i class="icon-stack"></i>
                    <span>ตั้งค่า</span>
                    <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                    <i class="icon-stack"></i>
                    <span>ระบบ</span>
                    <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                </li>
               <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                    <i class="icon-stack"></i>
                    <span>Starter kit</span>
                    <span class="badge bg-blue-400 align-self-center ml-auto">2.3</span>
                    </a>
                     <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
                        <li class="nav-item"><a href="../seed/layout_nav_horizontal.html"
                                class="nav-link">Horizontal navigation</a></li>
                        <li class="nav-item"><a href="../seed/sidebar_none.html" class="nav-link">No
                                sidebar</a>
                        </li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">3 sidebars</a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item"><a href="../seed/sidebar_right_hidden.html"
                                        class="nav-link">Right sidebar hidden</a></li>
                                <li class="nav-item"><a href="../seed/sidebar_right_visible.html"
                                        class="nav-link">Right sidebar visible</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link">Content sidebars</a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item"><a href="../seed/sidebar_content_left.html"
                                        class="nav-link">Left sidebar</a></li>
                                <li class="nav-item"><a href="../seed/sidebar_content_right.html"
                                        class="nav-link">Right sidebar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>                
            </ul>
        </div>
    </div>

</div>
`,
mixins: [],
data() {
return {
theme: 'AdminLte',
name: 'Navbar',
};
},
created() {
console.log( this.name + 'component is created',this);
},
mounted() {
    console.log('-------navbar mounted-----------');
},
methods: {},
computed: {},
components:{}
};