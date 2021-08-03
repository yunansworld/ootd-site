<?php
    session_start();
    $request_uri = $_SERVER["REQUEST_URI"];
?>

<header>
    <div class="nav_box center_h only-pc">
        <div class="nav_logo center"><a href="/index.php"><img src="/img/nav-logo.png" width="192" height="41" alt="logo"/></a></div>

        <nav class="center_wh">
            <ul>
                <a href="/product/list.php">
                    <li class="<?= (strpos($request_uri, "/product/") !== false?"active":"")?>">상품</li>
                </a>
                <? if(isset($_SESSION['user_uid']) && $_SESSION['user_uid'] != NULL) { ?>
                
                    <? if($_SESSION['user_type'] == 'M') { ?>
                        <li class="belit"></li>
                        <a href="/manager/sale.php">
                            <li class="<?= (strpos($request_uri, "/manager/") !== false?"active":"")?>">매니저</li>
                        </a>
                    <? } ?>
                
                    <? if($_SESSION['user_type'] == 'P') { ?>
                        <li class="belit"></li>
                        <a href="/partner/sale.php">
                            <li class="<?= (strpos($request_uri, "/partner/") !== false?"active":"")?>">파트너</li>
                        </a>
                    <? } ?>
                
                    <li class="belit"></li>
                    <a href="/mypage/profile.php">
                        <li class="<?= (strpos($request_uri, "/mypage/") !== false?"active":"")?>">마이페이지</li>
                    </a>
                
                    <li class="belit"></li>
                    <a href="/cart.php">
                        <li class="<?= (strpos($request_uri, "/cart.php") !== false?"active":"")?>">장바구니</li>
                    </a>
                <? } ?>
            </ul>
        </nav>

        <div class="nav_mypage center">
            <? if(!isset($_SESSION['user_uid']) || $_SESSION['user_uid'] == NULL) { ?>
                <a class="nav_menu" href="/user/login.php">
                    로그인
                </a>
            
                <a class="nav_menu ml_20" href="/user/join.php">
                    회원가입
                </a>
            <? } else { ?>
                <a href="/mypage/profile.php">
                    <span>
                        <? if($_SESSION['user_type'] == 'M') { ?>
                            <?= $_SESSION['manager_grade'] ?>&nbsp;
                        <? } ?>
                        <?= $_SESSION['user_name'] ?> 님
                    </span>
                </a>
                <a class="ml_20" href="/user/logout.php">
                    로그아웃
                </a>
            <? } ?>
        </div>
    </div>
    
    <div class="nav_box only-mobile">
        <div class="nav_hamburger">
            <img src="/img/nav_btn.png" width="20" height="16" />
        </div>
        <div class="nav_logo center_wh2">
            <a href="/index.php">
                <img src="/img/nav-logo.png" width="96" height="21" alt="logo"/>
            </a>
        </div>
        
        <div class="mask"></div>
        <div class="m-slide-menu">
            <div class="login-bar">
                <? if(!isset($_SESSION['user_uid']) || $_SESSION['user_uid'] == NULL) { ?>
                    <div class="login-btn href" data-url="/user/login.php">로그인</div>
                    <div class="join-btn href" data-url="/user/join.php">회원가입</div>
                <? } else { ?>
                    <div class="login-btn href" data-url="/mypage/profile.php">
                    <? if($_SESSION['user_type'] == 'M') { ?>
                        <?= $_SESSION['manager_grade'] ?> &nbsp;
                    <? } ?>
                        <?= $_SESSION['user_name'] ?> 님
                    </div>
                    <div class="join-btn href" data-url="/user/logout.php">로그아웃</div>
                <? } ?>
                <div class="close_btn">
                    <img class="center_wh" src="/img/close_icon.png" />
                </div>
            </div>
            <div class="scroll">
                <div class="href nav_menu_title <?= (strpos($request_uri, "/product/") !== false?"active":"")?>" data-url="/product/list.php">상품</div>
                
                <? if(isset($_SESSION['user_uid']) && $_SESSION['user_uid'] != NULL) { ?>
                    <? if($_SESSION['user_type'] == 'M') { ?>
                        <div class="href nav_menu_title <?= (strpos($request_uri, "/manager/") !== false?"active":"")?>" data-url="/manager/sale.php">매니저</div>
                    <? } ?>
                    
                    <? if($_SESSION['user_type'] == 'P') { ?>
                        <div class="href nav_menu_title <?= (strpos($request_uri, "/partner/") !== false?"active":"")?>" data-url="/partner/sale.php">파트너</div>
                    <? } ?>
                    
                    <div class="href nav_menu_title <?= (strpos($request_uri, "/mypage/") !== false?"active":"")?>" data-url="/mypage/profile.php">마이페이지</div>
                    <div class="href nav_menu_title <?= (strpos($request_uri, "/cart.php") !== false?"active":"")?>" data-url="/cart.php">장바구니</div>
                <? } ?>
                
                <div class="nav_menu_bottom">
                    <a href="https://pf.kakao.com/_dxnxlxmxb" target="_blank">
                        <img src="/upload/sidebar_bottom_banner.png" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>


<script>
    var nav_status = 0; // 0:closed, 1:open

    $(document).ready(function(){
        // 모바일 메뉴 열기
        $(".nav_hamburger").click(function(){
            openMMenu();
        });
        
        //모바일 메뉴 닫기
        $(".mask, .close_btn").click(function(){
            closeMMenu();
        });
        
        $(".href").click(function(){
            if($(this).data("url") != undefined) {
                location.href = $(this).data("url");
            } else {
                alert("준비중 입니다.");
            }
        });
    });
    
    function openMMenu() {
        $(".m-slide-menu").animate({ left: "0%" }, 200);
        $(".mask").fadeIn();
        nav_status = 1;
    }
    
    function closeMMenu() {
        $(".m-slide-menu").animate({ left: "-100%" }, 200);
        $(".mask").fadeOut();
        nav_status = 0;
    }
</script>