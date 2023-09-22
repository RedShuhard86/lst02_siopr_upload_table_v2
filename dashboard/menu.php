<?
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title></title>
</head>
<body>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    /*Общие*/
    ::-webkit-scrollbar {
        position: absolute;
        width: 8px;
        height: 8px;
        padding-left: 30px;
    }

    ::-webkit-scrollbar-thumb {
        /*background-color: #eef1f6;*/
        background-color: rgba(38, 72, 140, 0.25);;;
        border-radius: 4px;
        margin-right: 100px;
        height: 10px;


    }

    ::-webkit-scrollbar-track {
        background-color: transparent;
        padding: 2px 2px;
        width: 12px;
    }

    #page {
        margin-top: 48px;
    }

    #page,
    body {
        font-family: 'Roboto', sans-serif !important;
        background-color: #EDF2FB !important;
        font-size: 12px
    }

    body.modal-active {
        overflow: hidden;
    }

    body.modal-active #overlay {
        display: block;
    }

    body.modal-active-z-3 #overlay {
        display: block;
        z-index: 3;
    }

    .container {
        margin: auto;
        position: relative;

    }

    @media (min-width: 1400px) {
        .container {
            max-width: 1840px !important;
        }
    }

    .sub-menu {
        display: none;
    }

    .menu__link {
        padding: 4px 16px 4px 6px;
        border-radius: 4px;
    }

    .menu__link--active,
    .menu__link:hover {
        background: #EEF3FA;
    }

    .menu__razdelitel {
        height: 24px;
    }

    .menu__container {
        width: 308px;
        overflow-y: auto;
        overflow-x: hidden;
        background-color: white;
        min-width: 308px;
    }

    .menu {
        list-style-type: none;
        padding: 17px 0px 17px 8px;
        border: 1px solid #DFE4EE;
        border-top: 0;
        border-bottom: 0;
        width: 100%;
        margin-bottom: 0;
        min-height: 100%;
    }

    .menu__item {
        color: #333333;
        font-weight: 400;
        cursor: pointer;
        padding: 3px 16px 0px;
        padding-right: 0;
        line-height: 1.3;
        font-size: 13px;
    }

    .menu__item--icon {
        margin-right: 12px;
        width: 32px;
        height: 32px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .menu__item--icon i {
        margin: auto;
        color: #0049C7 !important;
        font-size: 24px !important;
    }

    .menu__item--label {
        max-width: 195px;
        font-size: 12px;
        line-height: 16px;
        color: #333333;

    }

    .menu__item--sub {
        position: relative;
        padding-bottom: 5px;
    }

    .menu__item--sub:before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 1px;
        background-color: #DFE4EE;
        border-radius: 8px;
    }

    .menu__item.menu__item--active {
        color: #1A78E2;
    }

    .menu__item--sub:after {
        /*content: "";
  width: 24px;
  height: 24px;
  background-image: url(../../assets/arrow-small-br.png);
  position: absolute;
  right: -9px;
  top: 50%;
  margin-top: -14.5px;*/
    }

    .menu__item.menu__item--active .menu__item--sub:before {
        display: none;
    }

    .menu__item--active:after {
        content: "";
        width: 4px;
        height: 100%;
        position: absolute;
        right: 0;
        top: 0;
        border-radius: 4px 0 0 4px;
        background-color: #1A78E2;;
    }

    .menu__item.menu__item--active .menu__item--sub:after {
        display: none;
    }

    .menu__item:hover,
    .menu__item.menu__item--active {
        background: linear-gradient(0deg, #EDF4FD, #EDF4FD), #FFFFFF;
        position: relative;
        border-radius: 5px;
    }

    .menu__item:last-child .menu__item--sub:before {
        display: none;
    }

    .header-search {
        width: 100%;
        max-width: 377px;
    }

    .header-search input {
        background-color: white;
        width: 100%;
        border: 1px solid #1a78e2 !important;
    }

    .header-search input:focus {
        /*border-color: #DFE4EE!important;*/

    }

    /*Хедер*/
    #header {
        background-color: #1A78E2;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        padding: 10px 0;
        z-index: 9999;
        height: 48px;
    }

    #header.search-active {
        padding: 8px 0;
    }

    #header > div {
        padding-top: 0;
        padding-bottom: 0;
    }


    .burger {
        position: relative;
        background-color: transparent;
        cursor: pointer;
        width: 24px;
        height: 24px;
        border-radius: 4px;
        transition: .4s;
    }

    .burger.burger__active,
    .burger:hover {
        background-color: white;
    }

    .burger.burger__active span,
    .burger:hover span {
        background-color: #1A78E2;
    }

    .burger span {
        width: 16px;
        position: absolute;
        height: 2px;
        left: 4px;
        background-color: white;
        transition: .4s;
    }

    .h-lk {
        height: 24px;
        margin: auto 0;
    }

    .h-lk > * {
        margin: auto 0;
    }

    .burger span:nth-child(1) {
        top: 6px;
    }

    .burger span:nth-child(2) {
        top: 50%;
        margin-top: -1px;
    }

    .burger span:nth-child(3) {
        bottom: 6px;
    }

    .menu-wrapper {
        margin-right: 16px;
    }

    .menus__wrapper {
        position: absolute;
        left: -30px;
        display: none;

    }

    .logo-t a {
        font-weight: 500;
        text-transform: uppercase;
        color: white;
        padding: 7px 12px;
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.15);
        text-decoration: none;
        display: block;
        line-height: 1;
        font-size: 13px;
    }

    .h-icons {
        margin-right: 40px;
    }

    .search-active .h-icons {
        width: 457px;
    }

    .h-icons > * {
        display: block;
        margin: auto;
        margin-right: 16px;
        cursor: pointer;
    }

    .h-icons > *.v-menu {
        display: none;
    }

    .h-icons > *:last-child {
        margin-right: 0;
    }

    .user__image {
        margin-right: 8px;
        width: 24px;
        height: 24px;
    }

    .user__image img {
        max-width: 100%;
        max-height: none;
    }

    .user__name {
        color: white;
        margin-right: 22px;
        font-size: 13px;
    }

    .v-dialog__content {
        position: absolute;
    }

    .v-dialog__content--new {
        width: 100%;
        left: 0;
        position: fixed;
        display: none;
    }

    .v-dialog__content--active {
        display: block;
    }

    .v-dialog__content--new::v-deep .v-dialog__content {
        justify-content: start !important;
        position: absolute;
    }

    .header__search--wrapper.select__wrapper.v-menu__content {
        max-width: 377px;
    }

    .overlay__menu {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: none;
        background-color: #bfc0c480;
        z-index: 1;
        cursor: pointer;
        opacity: 0;
        transition: .4s;
    }

    .overlay__menu.overlay__active {
        display: block;
        opacity: 1;
    }

    .v-dialog__header-style > div {
        overflow: hidden;
    }

    .menu {
        list-style-type: none;
        padding: 17px 0px 17px 8px;
        border: 1px solid #DFE4EE;
        border-top: 0;
        border-bottom: 0;
        width: 100%;
        margin-bottom: 0;
        min-height: 100%;
    }

    .menu__item.menu__item--active .menu__item--sub:before {
        display: none;
    }

    .menu .menu__item--val--item {
        color: #000000;
        text-decoration: none;
        display: block;
        position: relative;
        font-size: 12px;
        line-height: 16px;
        cursor: pointer;

    }

    .menu .menu__item--val--item span {
        max-width: 246px;
    }

    .menu .menu__item--val--item:before {
        content: "";
        width: 24px;
        height: 24px;
        left: 0;
        top: 0;
        display: block;
    }

    .menu .menu__item--val--item:after {
        content: "";
        width: 4px;
        height: 4px;
        background-color: #DFE4EE;
        position: absolute;
        left: 10px;
        top: 10px;
    }
</style>
<header id="header">
    <div data-v-620ae08e="" class="container d-flex justify-content-between align-items-center">
        <div data-v-620ae08e="" class="d-flex align-items-center">
            <div data-v-620ae08e="" class="menu-wrapper">
                <div data-v-620ae08e="" class="burger"><span data-v-620ae08e=""></span><span
                            data-v-620ae08e=""></span><span data-v-620ae08e=""></span></div>
                <div data-v-620ae08e="" class="v-dialog__content--new" style="top: 48px; height: 921px;">
                    <div data-v-620ae08e="" class="overlay__menu overlay__active"></div>
                    <div role="document" tabindex="0" data-v-620ae08e=""
                         class="v-dialog__content v-dialog__content--active" style="z-index: 202;">
                        <div class="v-dialog v-dialog__header-style v-dialog--active"
                             style="transform-origin: center center; max-width: 308px;">
                            <div data-v-e05c5444="" data-v-620ae08e="" class="d-flex">
                                <div data-v-e05c5444="" class="menu__container menu__container--nth-1"
                                     style="height: 921px;">
                                    <ul data-v-3b4df02a="" class="menu">
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                     style="background-image: url('/local/templates/siopr/img/icons/STO.svg');">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/STO.svg" width="100%"
                                                            height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da=""
                                                      class="menu__item--label">Стационарные объекты</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="189"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Розничная торговля</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1327"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Общественное питание</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1326"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Бытовое обслуживание</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1329"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Прочие объекты</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1328"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Предприятия оптовой торговли</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1316"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Стационарные объекты</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1335"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Интернет-торговля</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="254"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Классификатор домов</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="319"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Обслуживающие организации</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="970"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Заявка на СТО</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="624"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Ситуационные мероприятия</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Setevie Obect.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Сетевые компании</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="884"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сетевые компании</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="884"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Интернет-торговля</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Torgovie komplekci.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Торговые комплексы</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="816"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Торговые комплексы</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="400"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Договоры аренды земельных участков</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="918"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Включение предприятий в торговый комплекс</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="922"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Исключение предприятий из торгового комплекса</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="956"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Корректировка арендуемых площадей (аренда)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="976"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Заявка на создание Торгового комплекса</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="976"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Заявка на удаление Торгового комплекса</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Skidki.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Skidki.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Предприятия, предоставляющие скидку</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="470"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Программы для малообеспеченных групп населения</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="319"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обслуживающие организации</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/AZS.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/AZS.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">АЗС</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="760"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Автозаправчоные станции</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="939"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Включение предприятий в АЗС</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="948"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Исключение предприятий из АЗС</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="952"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Корректировка арендуемых площадей АЗС</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="439"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Марки топлива</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="884"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сетевые компании АЗС</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Torgovie komplekci.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Объекты оптовой торговли</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="10012"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Объекты оптовой торговли (Опт)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="941"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Включение предприятий в ООТ</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="950"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Исключение предприятий из ООТ</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="954"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Корректировка арендуемых площадей ООТ</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Grant.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Grant.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Гранты юридически лицам в период действия повышенной готовности</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="901"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Гранты юридическим лицам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Torgovie komplekci.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Товары первой необходимости</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="972"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Мониторинг СТО</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="563"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Товары первой необходимости</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Torg reyestr.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Торговый реестр с mos.ru</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="974"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Проект СТО</span></div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по стационарным объектам</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1056"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Договоры на вывоз мусора</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1059"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Категорирование предприятий оптовой торговли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1060"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Категорирование предприятий розничной торговли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1057"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Оформление договоров на вывоз мусора (с нормативами ДЖКХ)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1059"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Перечень прокатегорированных предприятий оптовой торговли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1283"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по QR-кодам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1245"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Перечень объектов категорирования по форме приказа МинпромторгРоссии от 15 января2018№ 78</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1272"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Справка о контроле за функционированием предприятий потребительского рынка</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1258"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Число работников хоз.субъектов СТО (общественное питание)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1258"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Число работников хоз.субъектов СТО (розничная торговля)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1161"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Количество форм аренды</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1026"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обеспеченность жителей</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da=""
                                                                      class="menu__item--label">Общие</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1294"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Генплан Форма №1</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1294"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Генплан Форма №2</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1275"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Городские мероприятия (с фото)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1154"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество оптовых предприятий по округам города Москвы</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1024"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество предприятий торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1155"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество стационарных объектов в жилых домах</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1156"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество стационарных объектов с разбивкой по площадям</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1163"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Контроль дубликатов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1174"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Ограничения по размещению</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1175"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Открытие новых торговых объектов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1178"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по измененным объектам за период</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1070"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Перечень объектов (розница)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1255"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Сравнение Типа здания и жилое/нежилое</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1219"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Характеристика действующих арендаторов складских помещений</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/Setevie Obect.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Сетевые объекты</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1170"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Некорректно привязаные сетевые объекты (СТО)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1186"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Поиск стационарных предприятий без признака "Сетевой объект"</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1203"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Сетевые и несетевые торговые объекты</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1249"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Сетевые компании розничной торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1217"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Список торговых сетей</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1080"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Хозяйствующие субъекты сетевых компаний</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('/local/templates/siopr/img/icons/Skidki.svg');">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/Skidki.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Предприятия, предоставляющие скидку</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1007"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Сведения о социальных объектах</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/Torgovie komplekci.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Торговые комплексы</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1273"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Арендаторы ТЦ, возобновившие деятельность</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1144"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Информация о торговых комплексах Excel</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1157"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество торговых комплексов по округам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1165"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Контроль заполнения данных по ТК</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1189"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Проверка адресов у арендаторов и субарендаторов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Мой район</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                                <li data-v-3228d6da="" class="menu__item">
                                                                    <div data-v-3228d6da=""
                                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__item--icon d-flex"
                                                                             style="background-image: url('undefined');"></div>
                                                                        <span data-v-3228d6da=""
                                                                              class="menu__item--label">Формат ДТиУ</span>
                                                                    </div>
                                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1292"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Количество всех стационарных торговых объектов</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1052"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Количество предприятий бытового обслуживания</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1067"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Количество предприятий общественного питания</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1079"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Количество стационарных торговых объектов (Опт)</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1078"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Количество стационарных торговых объектов (розница)</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1287"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Количество торговых объектов розничной торговли на дату</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__razdelitel"></div>
                                                                    </ul>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__item">
                                                                    <div data-v-3228d6da=""
                                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__item--icon d-flex"
                                                                             style="background-image: url('undefined');"></div>
                                                                        <span data-v-3228d6da=""
                                                                              class="menu__item--label">Формат МК</span>
                                                                    </div>
                                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1070"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Перечень объектов (Бытовое обслуживание)</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1070"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Перечень объектов (Общественное питание)</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1071"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Перечень объектов (Опт)</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1070"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Перечень объектов (Розница)</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__razdelitel"></div>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Розничная торговля</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1275"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Городские мероприятия (с фото)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1065"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Незадействованные адреса по объектам розничной торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1094"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Открытие новых предприятий розничной торговли по округам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1068"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Открытые/закрытые объекты розничной торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Оптовая торговля и склады</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1302"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Достижения целевых показателей по вакцинации для Оптовой торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1059"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Категорирование предприятий оптовой торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1154"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество оптовых предприятий по округам города Москвы</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1079"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество стационарных торговых объектов (опт)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1290"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество химически опасных объектов по округам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1296"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет об объемах операций организаций</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1285"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Оформление анкет безопасности</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1056"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Оформление договоров на вывоз мусора (оптовая торговля)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1071"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Перечень объектов(опт)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1059"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Перечень прокатегорированных предприятий оптовой торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1289"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Рассылка по предприятиям оптовой торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1301"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Регистрация объекта оптовой торговли по адресу предприятия оптовой торговли</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (оптовая торговля)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1219"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Характеристика действующих арендаторов складских помещений</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('/local/templates/siopr/img/icons/AZS.svg');">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/AZS.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da=""
                                                                      class="menu__item--label">АЗС</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1137"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Информация о АЗС</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1164"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Контроль заполнения данных</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Шиномонтаж и автомойки</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1136"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Заполнение данных по шиномонтажа/атомойкам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1220"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Шиномонтаж/автомойки без присоединенных файлов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/Torgovie komplekci.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Товары первой необходимости</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1053"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Динамика изменений показателей на группу товаров первой необходимости МинПромТорг</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1054"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Динамика изменений показателей на группу товаров первой необходимости</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1231"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Динамика изменений показетелей по сетям</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1262"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество необоснованно функционирующих СТО (бытовые услуги)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1262"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество необоснованно функционирующих СТО (общественное питание)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1262"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество необоснованно функционирующих СТО (реализация товаров)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1238"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Мониторинг запасов МинПромТорг</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1236"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Мониторинг остатков</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1237"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Мониторинг остатков МинПромТорг</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1063"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Мониторинг СТО с фотографиями</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1239"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Мониторинг цен и запасов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1242"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по мониторингу сетевых магазинов по округам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1261"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по мониторингу социальной дистанции</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1244"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по мониторингу СТО по датам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1242"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по мониторингу Торговых сетей</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1244"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по мониторингу Торговых сетей по датам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (бытовые услуги)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (общественное питание)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (оптовая торговля)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (розничная торговля)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1270"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (с фото)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1241"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Статистика по особым объектам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1256"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Торговые сети для выгрузки</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                     style="background-image: url('/local/templates/siopr/img/icons/NTO.svg');">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/NTO.svg" width="100%"
                                                            height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da="" class="menu__item--label">Нестационарные объекты</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1314"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Нестационарные торговые объекты</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="847"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Элементы схем размещения</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Объекты Метрополитен</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="882"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Торговые ряды метрополитен</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="10009"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Объекты метрополитен</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="764"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Договоры метрополитен</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="667"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Включение объектов в торговый ряд метрополитен</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="680"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Исключение объектов из торгового ряда метрополитен</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Схемы размещения НТО при СТО</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="986"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Заявка НТО при СТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="466"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Причины исключения из схемы размещения</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="875"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Причины отказа согласования размещения</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="442"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Настройки точек маршрута согласования схем размещения НТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по нестационарным объектам</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1286"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Динамика количества торговых объектов по малым форматам торговли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1280"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Информация о действующих договорах для ДЭПР</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1028"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по задолженностям</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1057"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Оформление договоров на вывоз мусора (с нормативами ДЖКХ)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1184"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Перерасчет пени и штрафов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1190"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Проверка наличия адресов в реестре БТИ по объектам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1182"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по торговым объектам "Метрополитен" (со станциями метро)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1019"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Актуальные договоры</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Формат ДТиУ</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1066"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество нестационарных торговых объектов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Статистические отчеты</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1284"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Неактуальные адреса НТО</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1001"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Нестационарные объекты без договоров</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1050"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет для РОССТАТА</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1198"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Сведения о количестве мест размещения нестационарных торговых объектов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1201"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Сводная таблица нестационарных объектов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Отчеты по обследованию</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1150"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество актов, выявленных/устраненных нарушений</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                     style="background-image: url('/local/templates/siopr/img/icons/Yarmarki.svg');">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Yarmarki.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da=""
                                                      class="menu__item--label">Ярмарки выходного дня</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="911"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Заявки на ГУ ярмарки</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="914"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Ввод нарушений на ярмарке</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="920"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Заполнение торговых периодов ярмарки</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="944"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Заседание комиссии по ЯВД</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="649"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Ввод коэффициентов сезонности</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="963"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Рассылка уведомлений участникам ЯВД</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="968"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Установка специализации мест ярмарок выходнго дня</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по ярмаркам выходного дня</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1125"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Акты выявленных нарушений</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1288"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр заявок с продавцами с фото</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1207"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сравнение двух торговых периодов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1214"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Статистика по местам на ярмарках</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1160"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Количество уникальных заявителей/участников на ЯВД за произвольный период</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Roznichnyye rynki.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da=""
                                                      class="menu__item--label">Розничные рынки</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="10001"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Розничные рынки</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="688"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Разрешение на право организации рынка</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="10010"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Планы размещения розничных рынков</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="525"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Управляющие рынками компании</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="990"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Информация о торговых местах на розничных рынках</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="429"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Категории товаров</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="845"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Хозяйствующие субъекты</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="434"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Классы реализуемых товаров</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="515"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Типы торговых мест</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="206"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Виды торгового места</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="222"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Специализации розничных рынков</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по розничным рынкам</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1153"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Количество розничных рынков по типам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1158"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Количество торговых мест и продавцов по рынкам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1051"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Количество торговых мест на специализированных сельскохозяйственных рынках</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1173"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Объекты по типам торговых мест</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1057"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Оформление договоров на вывоз мусора (с нормативами ДЖКХ)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1192"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Распределение продавцов и товаропроизводителей по регионам </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1199"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сведения о количестве продавцов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1200"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сведения о количестве работающих ИП</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Byt obsluzhivaniye.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da=""
                                                      class="menu__item--label">Бытовое обслуживание</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1326"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Бытовое обслуживание</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="884"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Сетевые компании</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1314"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Нестационарные торговые объекты</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="980"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Обследование объектов бытового обслуживания</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по бытовому обслуживанию</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1232"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Информирование о количестве изменений СТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1066"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Количество нестационарных объектов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1170"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Некорректно привязанные сетевые объекты(бытовые)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1267"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по видам и подвидам предоставляемых услуг</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1178"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по измененным объектам за период</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1179"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по показателям обеспеченности предприятиями бытового обслуживания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1057"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Оформление договоров на вывоз мусора (с нормативами ДЖКХ)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1186"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Поиск стационарных предприятий без признака «Сетевой объект» (Бытовые)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1007"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сведения о социальных объектах</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1074"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сетевые компании бытового обслуживания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1208"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сравнительный анализ цен оказываемых бытовых услуг</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1209"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сравнительный отчет по показателям обеспеченности населения объектами бытового обслуживания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1210"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Средние цены оказываемых бытовых услуг</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1023"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Статистика по стационарным объектам (Бытовые)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1056"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Договоры на вывоз мусора (бытовое обслуживание)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Мой район</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                                <li data-v-3228d6da="" class="menu__item">
                                                                    <div data-v-3228d6da=""
                                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__item--icon d-flex"
                                                                             style="background-image: url('undefined');"></div>
                                                                        <span data-v-3228d6da=""
                                                                              class="menu__item--label">Формат ДТиУ</span>
                                                                    </div>
                                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1052"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Количество предприятий бытового обслуживания</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__razdelitel"></div>
                                                                    </ul>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__item">
                                                                    <div data-v-3228d6da=""
                                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__item--icon d-flex"
                                                                             style="background-image: url('undefined');"></div>
                                                                        <span data-v-3228d6da=""
                                                                              class="menu__item--label">Формат МК</span>
                                                                    </div>
                                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1070"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Перечень объектов (бытовое обслуживание)</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__razdelitel"></div>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Обследование по соблюдению режима повышенной готовности</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (бытовое осблуживание)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                     style="background-image: url('/local/templates/siopr/img/icons/Obshchepit.svg');">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Obshchepit.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da=""
                                                      class="menu__item--label">Общественное питание</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/STO.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/STO.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Стационарные объекты</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="1327"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Общественное питание</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/NTO.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/NTO.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Нестационарные объекты</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="1324"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сезонные кафе</span></div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Spravochnic.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Spravochnic.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Справочники и классификаторы</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="465"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Причины жалоб граждан</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="884"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сетевые компании</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Обследование по соблюдению режима повышенной готовности</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="980"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обследование стационарных объектов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по общественному питанию</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1294"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Генплан Форма №1</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1294"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Генплан Форма №2</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1232"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Информирование о количестве изменений СТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1159"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Количество предприятий общественного питания в жилых домах</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1170"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Некорректно привязанные сетевые объекты(Общественное питание)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="980"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обследование стационарных объектов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1278"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Объекты, возобновившие деятельность (Летние кафе)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1279"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Объекты, возобновившие деятельность (Общественное питание)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1277"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчёт "Обследование стационарных объектов в разрезе округов/районов"</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1260"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по питанию больниц</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1057"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Оформление договоров на вывоз мусора (с нормативами ДЖКХ)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1069"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Перечень заявок на выполнение государственного задания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1186"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Поиск стационарных предприятий без признака «Сетевой объект» (Общественное питание)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1281"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Предприятия общественного питания по видам объектов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1007"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сведения о социальных объектах</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1282"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сетевые компании общественного питания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1254"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Статистика по работе объектов общественного питания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1023"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Статистика по стационарным объектам (Общепит)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1254"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Статистика по численности работников объектов общественного питания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1056"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Договоры на вывоз мусора (общественное питание)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('/local/templates/siopr/img/icons/STO.svg');">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/STO.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Стационарные объекты</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1149"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Стационарные предприятия общественного питания</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1076"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Срок действия предприятий</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Мой район</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                                <li data-v-3228d6da="" class="menu__item">
                                                                    <div data-v-3228d6da=""
                                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__item--icon d-flex"
                                                                             style="background-image: url('undefined');"></div>
                                                                        <span data-v-3228d6da=""
                                                                              class="menu__item--label">Формат ДТиУ</span>
                                                                    </div>
                                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1067"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Количество предприятий общественного питания</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__razdelitel"></div>
                                                                    </ul>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__item">
                                                                    <div data-v-3228d6da=""
                                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__item--icon d-flex"
                                                                             style="background-image: url('undefined');"></div>
                                                                        <span data-v-3228d6da=""
                                                                              class="menu__item--label">Формат МК</span>
                                                                    </div>
                                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                                        <li data-v-3228d6da="" class="menu__link">
                                                                            <div data-v-3228d6da=""
                                                                                 class="menu__item--val">
                                                                                <div data-v-3228d6da=""
                                                                                     data-type="report"
                                                                                     data-link="/dashboard/report/"
                                                                                     data-id="1070"
                                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                                    <span data-v-3228d6da="">Перечень объектов (общественное питание)</span>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <div data-v-3228d6da=""
                                                                             class="menu__razdelitel"></div>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Обследование по соблюдению режима повышенной готовности</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1277"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчёт "Обследование стационарных объектов в разрезе округов/районов"</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1276"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по загруженным актам питания больниц</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (общественное питание)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Torg reyestr.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da=""
                                                      class="menu__item--label">Торговый реестр</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="10151"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Объекты торгового реестра</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="720"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Сведения в минпромторг</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="650"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Раздел III. Экономические показатели</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по торговому реестру</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1010"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по Торговому реестру (группировка по ТО)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1010"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по Торговому реестру (группировка по ХС)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1010"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по Торговому реестру (по адресам ТО)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1010"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по Торговому реестру (по адресам ХС)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link menu__link--active">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1040"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Раздел I. Сведения о хозяйствующих субъектах, осуществляющих торговую деятельность</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1122"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Торговый реестр</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1041"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Раздел II. Сведения о хозяйствующих субъектах, осуществляющих поставки товаров (за исключением производителей товаров)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Regional'nyye yarmarki.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da=""
                                                      class="menu__item--label">Региональные ярмарки</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="924"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Планы проведения ярмарок</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="863"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Площадки региональных ярмарок</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="863"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Ягодные площадки</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="736"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Организаторы региональных ярмарок</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по региональным ярмаркам</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1308"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Адресный перечень региональных ярмарок</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1309"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">График проведения региональных ярмарок (организаторы)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1129"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">График проведения региональных ярмарок (регионы)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Kontrol'.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da="" class="menu__item--label">Контроль и обследование</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="277"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Проверки предприятий</span></div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Обследование объектов НТО</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="936"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Акты, выявленных/устраненных нарушений</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Работа по договорам с выявленными нарушениями</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="10018"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Подготовка уведомлений</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="10018"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Контроль за устранением</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Несанкционированная торговля</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="916"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Ввод нарушений по несанкционированной торговле</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Цены и номенклатура</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="778"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Номенклатура</span></div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Контроль пунктов вакцинации</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="710"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Контрольный лист пунктов вакцинации</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Обследование по соблюдению режима повышенной готовности</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="995"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Заявка на работу по указу Мэра 35-УМ</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="980"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обследование объектов бытового обслуживания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="980"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обследование объектов СТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="712"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обследование стационарных объектов (Указ Мэра 35-УМ)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="980"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обследование стационарных объектов интернет торговли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="980"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обследование стационарных объектов общественного питания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="980"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Обследование стационарных объектов розничной торговли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Torg reyestr.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da=""
                                                              class="menu__item--label">Реестры</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="993"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр грантов юридических лиц по 552 ПП</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="993"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр грантов юридических лиц по 552 ПП Отдел по обеспечению антитеррористической безопасности</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="993"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр грантов юридических лиц по 552 ПП Управление агропромышленного комплекса и оптовой торговли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="993"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр грантов юридических лиц по 552 ПП Управление бытовых услуг и безопасности</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="993"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр грантов юридических лиц по 552 ПП Управление общественного питания</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="993"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр грантов юридических лиц по 552 ПП Управление развития инфраструктуры розничной торговли и услуг</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="993"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр грантов юридических лиц по 552 ПП Управление ритуальной отрасли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="993"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реестр грантов юридических лиц по 552 ПП Управление экономики государственного заказа и городского имущества</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по контролю и обследованию</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1178"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по измененным объектам за период</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1201"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сводная таблица нестационарных объектов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1003"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Статистика по освобождению земельных участков</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Несанкционированная торговля</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1015"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Данные об административных нарушениях</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1085"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по несанкционированной торговле (Новый)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Обследование по соблюдению режима повышенной готовности</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1300"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Достижение целевых показателей по вакцинации</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1303"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Достижение целевых показателей по вакцинации (с детализацией)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1269"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Обследование стационарных объектов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1277"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчёт "Обследование стационарных объектов в разрезе округов/районов"</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1298"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Проверка предприятий, вошедших в реестр в рамках указа Мэра Москвы № 35-УМ</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (бытовые услуги)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (Общественное питание)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (Оптовая торговля)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1271"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (Розничная торговля)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1270"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Соблюдение предписаний РПН (с фото)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                     style="background-image: url('/local/templates/siopr/img/icons/Kategorirovaniye.svg');">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Kategorirovaniye.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da=""
                                                      class="menu__item--label">Категорирование</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Распоряжения префектур ПП РФ №1273 от 19.10.2017</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="10017"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Распоряжения префектур</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Решения РГ Префектур</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="988"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Решения РГ префектур</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Kategorirovaniye.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Kategorirovaniye.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Категорирование</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="1337"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Субъекты категорирования</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по категорированию</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1293"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по измененным субъектам категорирования за период</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1264"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Результаты категорирования и паспортизации торговых объектов по ПП РФ № 1273</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1263"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Согласование паспортов безопасности торговых объектов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Bezopasnost'.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da="" class="menu__item--label">Продовольственная безопасность</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Spravochnic.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Spravochnic.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da=""
                                                              class="menu__item--label">Справочники</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="330"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Предприятия</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="327"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Направления отрасли</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="337"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Товары</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="325"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Интегрированные хозяйства</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="620"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Покупатели</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="611"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Поставщики</span></div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Dogovory NTO.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da=""
                                                              class="menu__item--label">Документы</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="930"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отходы товаров</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="932"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Поступление товаров</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="934"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реализация товаров</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="932"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Поступление ТПН</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="934"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Реализация ТПН</span></div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Адреса</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="332"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Районы (Продбезопасность)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="329"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Округа (Продбезопасность)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="334"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Регионы (Продбезопасность)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="865"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Страны мира</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="340"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Федеральные округа (Продбезопасность)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Статистические данные</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="858"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Товары ФТС</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="338"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Товары МОССТАТ</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="928"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Загрузка статистических данных</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1111"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Статистические данные (МОССТАТ) ввоз/вывоз</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1112"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Статистические данные (ФТС) импорт/экспорт</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1110"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Сводная форма данных (МОССТАТ и ФТС)</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по продовольственной безопасности</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1295"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Продбезопасность Минпромторг</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1296"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет об объемах операций организаций</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Остатки</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1099"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет об изменении остатков</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1104"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по остаткам товаров</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1108"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по прогнозу остатков</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('/local/templates/siopr/img/icons/Spravochnic.svg');">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/Spravochnic.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">По документам</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1096"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Аналитический отчет о поступлении продовольствия из стран в разрезе товаров</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1101"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по анализу документов поступлений и реализаций за период</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1096"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Аналитический отчет о поступлении продовольствия из субъектов РФ в разрезе товаров</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1095"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Аналитический отчет о поступлении продовольствия по импорту в разрезе групп товаров (товаров)</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1096"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Аналитический отчет о поступлении товаров в разрезе стран - поставщиков</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1096"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Аналитический отчет о поступлении товаров в разрезе субъектов РФ-поставщиков</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1096"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Аналитический отчет о поступлении товаров за период времени</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1097"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Аналитический отчет о сравнении объемов поступления (реализации) товаров за несколько периодов</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1098"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Аналитический отчет об изменении цен поступления/реализации за период времени</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1106"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по поступлению товаров</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1102"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по движению товаров</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1103"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по закладке</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1105"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по отходам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1107"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по поступлению из интегрированных хозяйств</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1109"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет по реализации</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Dogovory razmeshcheniya NTO.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da="" class="menu__item--label">Договоры на размещение НТО</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="693"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Регистрация плана поступления оплат</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по договорам на размещение НТО</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1064"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Детальный отчет по начисленным штрафам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1134"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Договора с незаполненными обязательными реквизитами</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1135"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Задолженность по договорам НТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1081"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Информирование о необходимости продолжения работ над штрафами</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1062"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Количество действующих договоров по округам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1064"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Начисленные штрафы</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1171"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">НТО: план-фактный анализ по договорам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1113"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">План и фактическое поступление денежных средств по договорам на НТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1072"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">План поступления денежных средств по действующим договорам на НТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1073"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">План поступления денежных средств по расторгнутым договорам на НТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1196"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Рекомендации по устранению ошибок при выгрузке на ОДОПМ</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                                            data="/local/templates/siopr/img/icons/Dogovory NTO.svg"
                                                                            width="100%" height="100%"
                                                                            class="d-none"></object>
                                                                </div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Договоры</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1168"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Отчет о наличии заключенного договора по НТО и план-графика оплат</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1008"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Статистика договоров и планов платежей</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Взаиморасчеты по договорам</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1304"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Ведомость по платежам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1011"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Движение ден.средств по договорам</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1044"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Еженедельный отчет от префектур</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__item">
                                                            <div data-v-3228d6da=""
                                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                                     style="background-image: url('undefined');"></div>
                                                                <span data-v-3228d6da="" class="menu__item--label">Учет задолженности по договорам</span>
                                                            </div>
                                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                                <li data-v-3228d6da="" class="menu__link">
                                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                                        <div data-v-3228d6da="" data-type="report"
                                                                             data-link="/dashboard/report/"
                                                                             data-id="1150"
                                                                             class="d-flex align-items-center menu__item--val--item">
                                                                            <span data-v-3228d6da="">Количество актов, выявленных/устраненных нарушений</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Dogovory NTO.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da=""
                                                              class="menu__item--label">Договоры</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="715"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Договоры</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="692"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Регистрация дополнительного соглашения НТО</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="806"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Результаты аукционов</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da=""
                                                              class="menu__item--label">Взаиморасчеты</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="926"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Поступление денежных средств</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="678"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Изменение реквизитов организаций</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="958"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Корректировка суммы договора/плана-графика </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Учет задолженности по договорам</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="960"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Начисление пени</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="961"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Начисление штрафа</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="966"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Уведомления по договорам</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Mezhregion yarmarki.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da="" class="menu__item--label">Межрегиональные ярмарки</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="895"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Площадки межрегиональных ярмарок</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Ritaulnyye obyekty.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da="" class="menu__item--label">Объекты ритуального обслуживания</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1339"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">ГСС</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="10014"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Кладбища и Крематории</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="1340"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Масетрские по изготовлению надмогильных сооружений</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Пункты приема заказов</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="1341"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Пункты приема заказов на организацию похорон</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="1342"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Пункты приема заказов на установку надмогильных сооружений</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('undefined');"></div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Торговые объекты</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="1344"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Магазины надмогильных сооружений</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="1343"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Магаизны ритуальной продукции</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Otchet.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Otchet.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da="" class="menu__item--label">Отчеты по ритуальным объектам</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1248"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Общий отчет по объектам ритуального назначения</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1178"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Отчет по измененным объектам за период</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="report"
                                                                     data-link="/dashboard/report/" data-id="1240"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Расширенный отчет по объектам ритуального назначения</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                     style="background-image: url('/local/templates/siopr/img/icons/Festivali.svg');">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Festivali.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da="" class="menu__item--label">Фестивали</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                             style="background-image: url('/local/templates/siopr/img/icons/Festivali.svg');">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Festivali.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da=""
                                                              class="menu__item--label">Фестивали</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="899"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Фестивали</span></div>
                                                            </div>
                                                        </li>
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="554"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Площадки фестивалей</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__item">
                                                    <div data-v-3228d6da=""
                                                         class="menu__item--val menu__item--sub d-flex align-items-center">
                                                        <div data-v-3228d6da="" class="menu__item--icon d-flex">
                                                            <object data-v-3228d6da="" type="image/svg+xml"
                                                                    data="/local/templates/siopr/img/icons/Dogovory NTO.svg"
                                                                    width="100%" height="100%" class="d-none"></object>
                                                        </div>
                                                        <span data-v-3228d6da=""
                                                              class="menu__item--label">Договоры</span>
                                                    </div>
                                                    <ul data-v-3228d6da="" class="sub-menu menu">
                                                        <li data-v-3228d6da="" class="menu__link">
                                                            <div data-v-3228d6da="" class="menu__item--val">
                                                                <div data-v-3228d6da="" data-type="table"
                                                                     data-link="/dashboard/table/" data-id="731"
                                                                     class="d-flex align-items-center menu__item--val--item">
                                                                    <span data-v-3228d6da="">Договоры фестивали</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li data-v-3228d6da="" data-v-3b4df02a="" class="menu__item">
                                            <div data-v-3228d6da=""
                                                 class="menu__item--val menu__item--sub d-flex align-items-center">
                                                <div data-v-3228d6da="" class="menu__item--icon d-flex"
                                                     style="background-image: url('/local/templates/siopr/img/icons/Spravochnic.svg');">
                                                    <object data-v-3228d6da="" type="image/svg+xml"
                                                            data="/local/templates/siopr/img/icons/Spravochnic.svg"
                                                            width="100%" height="100%" class="d-none"></object>
                                                </div>
                                                <span data-v-3228d6da="" class="menu__item--label">Справочники и классификаторы</span>
                                            </div>
                                            <ul data-v-3228d6da="" class="sub-menu menu">
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="845"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Хозяйствующие субъекты</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="242"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Виды услуг населению</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="237"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Виды нестационарных объектов</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="825"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Округа</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="836"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Районы</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="235"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Виды местоположения</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="273"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Описания местоположения объектов</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="210"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Место расположения</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="823"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">ОКОПФ</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="838"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Специализации</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="738"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Организации</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="247"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Выходные дни</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="241"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Виды проверок</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="238"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Виды отношения к недвижимости</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="271"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Объекты городского значения</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="831"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Показатели обследований</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="287"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Схемы размещения</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="288"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Типы зданий</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="289"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Типы льгот</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="291"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Типы обследований</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="293"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Типы помещений</span></div>
                                                    </div>
                                                </li>
                                                <li data-v-3228d6da="" class="menu__link">
                                                    <div data-v-3228d6da="" class="menu__item--val">
                                                        <div data-v-3228d6da="" data-type="table"
                                                             data-link="/dashboard/table/" data-id="295"
                                                             class="d-flex align-items-center menu__item--val--item">
                                                            <span data-v-3228d6da="">Типы результатов обследования</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div data-v-3228d6da="" class="menu__razdelitel"></div>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-v-620ae08e="" role="dialog" class="v-dialog__container"></div>
            </div>
            <div data-v-620ae08e="" class="logo-t"><a data-v-620ae08e="" href="/dashboard/">Егас Сиопр</a></div>
        </div>
        <div data-v-620ae08e="" class="d-flex">
            <div data-v-620ae08e="" class="d-flex h-icons">
                <div data-v-620ae08e="" class="header-search">
                    <div data-v-620ae08e="">
                        <svg data-v-620ae08e="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    data-v-620ae08e=""
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M15.4659 15.1114C16.3023 14.0298 16.8 12.6729 16.8 11.1998C16.8 7.66518 13.9346 4.7998 10.4 4.7998C6.86538 4.7998 4 7.66518 4 11.1998C4 14.7344 6.86538 17.5998 10.4 17.5998C11.8848 17.5998 13.2515 17.0942 14.3374 16.2457L17.0481 18.9741C17.3595 19.2875 17.866 19.2892 18.1794 18.9778C18.4929 18.6664 18.4945 18.1599 18.1831 17.8464L15.4659 15.1114ZM10.4 15.9998C7.74903 15.9998 5.6 13.8508 5.6 11.1998C5.6 8.54884 7.74903 6.39981 10.4 6.39981C13.051 6.39981 15.2 8.54884 15.2 11.1998C15.2 13.8508 13.051 15.9998 10.4 15.9998Z"
                                    fill="white"
                            ></path>
                        </svg>
                    </div>
                </div>
                <div data-v-620ae08e="" class="v-menu"></div>
                <div data-v-620ae08e="">
                    <svg data-v-620ae08e="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                data-v-620ae08e=""
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M6.67749 19.3261L7.77632 13.3726L3.38794 9.20192L9.38965 8.40722L12.0001 2.94482L14.6105 8.40722L20.6122 9.20192L16.2239 13.3726L17.3227 19.3261L12.0001 16.4413L6.67749 19.3261ZM12.0001 14.6214L15.1416 16.3241L14.493 12.8102L17.0832 10.3486L13.5408 9.87954L12.0001 6.65553L10.4594 9.87954L6.91703 10.3486L9.50713 12.8102L8.85858 16.3241L12.0001 14.6214Z"
                                fill="white"
                        ></path>
                    </svg>
                </div>
                <div data-v-620ae08e="">
                    <svg data-v-620ae08e="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                data-v-620ae08e=""
                                d="M3.75 12.5C3.75 10.9812 4.98122 9.75 6.5 9.75H7C7.13807 9.75 7.25 9.86193 7.25 10V15C7.25 15.1381 7.13807 15.25 7 15.25H6.5C4.98122 15.25 3.75 14.0188 3.75 12.5Z"
                                stroke="white"
                                stroke-width="1.5"
                        ></path>
                        <path
                                data-v-620ae08e=""
                                d="M20.25 12.5C20.25 10.9812 19.0188 9.75 17.5 9.75H17C16.8619 9.75 16.75 9.86193 16.75 10V15C16.75 15.1381 16.8619 15.25 17 15.25H17.5C19.0188 15.25 20.25 14.0188 20.25 12.5Z"
                                stroke="white"
                                stroke-width="1.5"
                        ></path>
                        <path
                                data-v-620ae08e=""
                                d="M18 10V8.93697C18 6.40002 16.3029 4.17658 13.8558 3.50744V3.50744C12.6409 3.17525 11.3591 3.17525 10.1442 3.50744V3.50744C7.69709 4.17658 6 6.40002 6 8.93697V10"
                                stroke="white"
                                stroke-width="1.5"
                        ></path>
                        <path data-v-620ae08e="" d="M14 19V19C16.2091 19 18 17.2091 18 15V15" stroke="white"
                              stroke-width="1.5"></path>
                        <rect data-v-620ae08e="" x="9.75" y="17.75" width="4.5" height="2.5" rx="1.25" stroke="white"
                              stroke-width="1.5"></rect>
                    </svg>
                </div>
            </div>
            <div data-v-620ae08e="" class="d-flex h-lk align-items-center">
                <div data-v-620ae08e="" class="user__image">
                    <img
                            data-v-620ae08e=""
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAZgSURBVHgBhVbJbxvXGf+9N2+GwyFFUpRJUY4UUgu1OFFkxwhgNwYsnYocmjrodkmB5lAUaA9Wbg4K1BTQQw9J4//AQXtoUxRp2gZpUcCN7Rpw0iZVGqCOY1kWZVGSJVJcxH2W9/INAwVxEicDPJKYefMtv+V9ZPiKa7miYq7EWcUwr4AMpMr0HjBUmWLvu0z+mdn26yeHgvkHxWAPCJxRTF2koPP+Bsfp4tY711GvVKEpieHxcQzOPEJvCyjKzhhecYClk/0s/7UJliveIufsPD2J0YvYXruDv730S6ytrKBSbyAZDSGiM4yMZzF35gcYO/VNUCF+oqqSztLxAePCAxO8V1HnaWtOcAWhMZRLJfz67M9g7BfBug3s1RpoOR7mxlKIGhxMM/D4d5/F1LeepQR+EvpgKjcX1ZcOYvKDH2+tbS0qaec05m+itqmuDwiW2s49aJCYnR7D06efwKlHJ7BSKCEWC2MwouH2m7/H9ntXab/XW9Kxc1fXtxYP4mr+x7lcLtOoFn/nKc8UugEh9F6Sy6/9EXZ5BzPZMYyNpjE8nMD01DAOx/tw+84mJtIJwHPQ2MyjO5BAqbiN9Ts3cOOdayeyk5lX33373arwEwjNzZXv5mPV7U0UkoMYmZyCxg3cuP4vJCJB9MXjEAGBoGUhHBJ49LFJrKxswiVIzFAQ9eI97P71Dyg5ClJ68FwZE0pdpNAL7FzuXEZAW1NUMSfcNa5B0zTsbhXxn0uXMEXJZqenkEn2ITVgIWgKgtnDpX9ch8FacF0H+w0X5mAKxUDE58BPQPc96MLpFwGunXHohiYILUkVKJu6VthaXUW31Uaz0UCnvo/8/i5q5RAmsxnUdnexW95HkDcRjURRJXVpKMHIROEQdz7ZSkp0OlgUg4nEtyXd8Ku2bRu246C2t4fK9hba7RYCRgD5AgVvNDGWiiM7/jBur27i2q0dLExYVEALVSqiW29idmoGZqSPAhMvjQ7are5poQ6NH9WFIB44BJnGovZ37r6B8l4JjusiZJo4kh1HRPNQbpHCbIXpdApPZCrQ+X7PhI12m545OOIyRA5PINCxoWpNqEY3w5uejLUkQ5vrkGYQIBXt7+zADBiQjMPUdQyELaSScZDK0O66iMRCOJ59CPV6l/bplMRBh1a5WIUbT0MmRxHMTCE2OZ3hVshCKBwidYRh9fVB0wUcj9Rh6Ki1mqT5DYKngyZ103Fc3CPzKeIrTqSXGw7tBUwqzNB0FDYKPexF0KIVgmGFIXQzsq4ZgTQ3DAquwTOJaKah1en2jL5FhLYpeJ1gCDgd8D0XNYPBZpTQk7j6/grikZBvG7SJC3DRsxfzDctVlUvwNc9XD2X2PJIWZU8cOQaX6T3iS8TFdrlE0DhIJPoxkOpHLB4lQTjIk5Jsz0W5VkfUMgm6KJkqQHH8eCRXKf8nXOlegcfnfd1+4m2OmdNPkRJcVCsVuK06GnYXGztljB5OIHQ4TkLs4PryTRTKFYz2W8SNJE8QNFYfHSr4tFj6fp29/NZyTHTdiiBc/eVXzchsHlXGqW2HxPz/P/0WqkW6lzbCQmKjsIVrH3xEAVykLIE4nUvcCOOxH55F/8QjZDK3Z0APapQ/v3Cs6knvsn/Tdj5ZHv32jzu/Vd9kqmdEnSolyKot7BV3kbR0pElNITNAXAg8/uNziI7N9BTlL3r3lReeWcj3ziLVVc85wl3mUsU8Im6nuIX1W6to7pWRCnrUFcmVyOOM8JVhJEbGkX6oDc+wgKEJRGdPIJAc/rQ4wr7qenzpvnnw84tvLN78939fvnPjw96Qkf7kGjqE+ZOzCBC+Qe6BU9v+wR8yOYZSUZJiFEGSdxMBfFQo4mahAvPQCPqHks+/+NPvXfjCwHl44lSOSe+8IkMp5o8KhacXjiM7koBBvZqCDkQiMNJnIGwFYASCJG0TNAGJN4a72xX85rUrS2/+8y+5++bBwVUr3708MJCuca6dIBmbuiZwj9x5am4MqYiFaMhEkDKFyeX+GWUETBjkH4PcrnFeZYK98IsXX/rVZ2Pel8C/KuWNtweT469SD/0Ex1GSM1bXd/GNo1mqmoKR0nyXG+RefzhxTqOT8Stcak89+f0f/f3z8b70X8XBNT09n3GVd0Zj7Ew6FZ/7yXeejKUSUZ/0dU0YeQ51mUNeOPbMc9UHxfgYc3gEMBlmBSQAAAAASUVORK5CYII="
                            alt="Константинопольская К."
                    />
                </div>
                <div data-v-620ae08e="" class="user__name"><?=$_SESSION['login'];?></div>
                <div data-v-620ae08e="" class="exit">
                    <a data-v-620ae08e="" href="#">
                        <svg data-v-620ae08e="" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path data-v-620ae08e=""
                                  d="M17 7.2V6C17 4.89543 16.1046 4 15 4H8C6.89543 4 6 4.89543 6 6V18C6 19.1046 6.89543 20 8 20H15C16.1046 20 17 19.1046 17 18V17.3333"
                                  stroke="white" stroke-width="1.5"></path>
                            <path
                                    data-v-620ae08e=""
                                    d="M19.5 12L19.9685 12.5857C20.1464 12.4433 20.25 12.2278 20.25 12C20.25 11.7722 20.1464 11.5567 19.9685 11.4143L19.5 12ZM17.4685 9.41435C17.1451 9.15559 16.6731 9.20803 16.4143 9.53148C16.1556 9.85493 16.208 10.3269 16.5315 10.5857L17.4685 9.41435ZM16.5315 13.4143C16.208 13.6731 16.1556 14.1451 16.4143 14.4685C16.6731 14.792 17.1451 14.8444 17.4685 14.5857L16.5315 13.4143ZM19.9685 11.4143L17.4685 9.41435L16.5315 10.5857L19.0315 12.5857L19.9685 11.4143ZM19.0315 11.4143L16.5315 13.4143L17.4685 14.5857L19.9685 12.5857L19.0315 11.4143Z"
                                    fill="white"
                            ></path>
                            <path data-v-620ae08e=""
                                  d="M11 11.15C10.5306 11.15 10.15 11.5306 10.15 12C10.15 12.4694 10.5306 12.85 11 12.85L11 11.15ZM11 12.85L19 12.85L19 11.15L11 11.15L11 12.85Z"
                                  fill="white"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<script type="text/javascript">
    $(".overlay__menu").on('click', function () {
        console.log(123);
        $('.burger').siblings(".v-dialog__content--new").hide();
        $('.burger__active').removeClass('burger__active');

    })

    $('.burger').on('click', function () {
        $(this).addClass('burger__active');
        $(this).closest('.burger').siblings(".v-dialog__content--new").show();
        let height = $("#header").outerHeight();
        $(".v-dialog__content--new").css("top", height + "px");
        $(".v-dialog__content--new").css("height", (window.innerHeight - height) + "px");
    })
    $(".menu__item--val--item").on('click', function () {
        window.open($(this).data('link') + $(this).data('id'));
    })
    $(".menu__item--val.menu__item--sub").on('click', function () {
        // Контейнер всех меню
        var big_papa = $(".v-dialog__header-style > div");
        // Какой следующий контейнер по счету
        var parent_class = $(this).parents(".menu__container").attr('class');
        var cnt = parseInt(parent_class.replace("menu__container menu__container--nth-", ""));
        // Все контейнеры
        var containers = $(".menu__container");

        // Удаляем все последующие контейнеры/Возвращаем меню обратно
        for (var i = containers.length - 1; i >= cnt; i--) {
            $(containers[(i - 1)]).find(".menu__item--active").parent().append($(containers[i]).children(".menu").addClass("sub-menu"));
            containers[i].remove();
        }
        $(".v-dialog__header-style").css("max-width", ((cnt * 308) + 308) + "px");
        // Если в этом контейнере есть уже активный итем - убрать активность
        $("." + parent_class.replace(" ", ".")).find(".menu__item--active").removeClass("menu__item--active");
        //
        var sub_menu = $(this).siblings(".sub-menu");
        if (sub_menu.length > 0) {
            // Дата стили
            var data_styles = "";
            $.each($(this).closest(".menu__container").data(), function (index, val) {
                if (val == "") {
                    var c = index.slice(1);
                    if (c.charAt(0) == "-")
                        c = c.slice(1);
                    data_styles += "data-v-" + c + " ";
                }
            })
            // Класс активного итема
            $(this).addClass("menu__item--active");
            // Создаем новый контейнер для подменю
            var new_classes = "menu__container--nth-" + (cnt + 1);
            var new_container = "<div " + data_styles + " class='menu__container " + new_classes + "'></div>";
            // Добавляем контейнер на страницу
            big_papa.append(new_container);
            // Ширина экрана минус хедер
            $("." + new_classes).css("height", ($(window).height() - $("#header").outerHeight()));
            // Добавляем меню в новый контейнер
            $("." + new_classes).append(sub_menu.removeClass("sub-menu"));

        } else {
            $(".v-dialog__header-style").css("max-width", (((cnt - 1) * 308) + 308) + "px");
        }
    })
</script>
</body>
</html>