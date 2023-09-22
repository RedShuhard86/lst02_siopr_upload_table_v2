<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="ru">
<head>
    <title>Оптовая торговля</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css_wt/style_wt_new.css">
    <script src="./js_wt/script_wt_new.js"></script>


    <style type="text/css">
        .custom-select__list_hidden {
            display: none !important;
        }

        .custom-select__list_opened {
            display: block !important;
        }

        .tab-custom-select__label-text {
            display: block;

            margin-bottom: 5px;

            font-size: 14px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: 1.43;
            letter-spacing: normal;
            color: black;
        }

        .tab-custom-select__input-container {
            padding-top: 2px;

            border-bottom: 2px solid #fc9934;

            background-color: transparent;
            cursor: pointer;
        }

        .tab-custom-select__font-style {
            font-size: 14px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: 1.43;
            letter-spacing: normal;
            color: black;
        }

        .tab-custom-select__input {
            float: left;

            *padding-top: 5px;
            padding-left: 15px;

            font-size: 13px;
            font-weight: bold;

            border: none;

            background: transparent;
        }

        .tab-custom-select__open-btn {
            float: left;

            width: 32px;

            border: none;

            cursor: pointer;
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPdJREFUSA1jYBgFoyEwGgJYQ+D/TB1lEMYqiSb4f6417/8ZupZownAuE5yFxPj3h2H/v9//r/6fpuuJJIzB/D/TWPLfj4+n//75dwyo1hhDAVAAqwUM//8v+8/AwP7v37/1uCwBG/7n5/7///+rMzIyXGAQ4blGtAXMOVcrGBkZJ+GyBN1wJnY+Z8aw49+xWcCITRAm9neqzkSgC/OAin4yMTEFMmZd3o7V8JTj72B60Gm8FoAUI1vyn5Epg5HhfwUsWMAux2M4SD9BC5AtAbFBABTmxBgOVgvWQQQB9wkJhhNhLKoSoCUl/+dYCqGKjvJGQ2DIhwAA19t/kaFhtSsAAAAASUVORK5CYII=') no-repeat center center;
        }

        .tab-custom-select__open-btn:focus {
            outline: none;
        }

        .tab-custom-select__open-btn_when-multi-select {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wgJDCEp1kuzLAAAAC1JREFUSMdjYBgFo2DIg60MDAz/CeCt+AxgooIj/o/GwWgcjMbBSI+DUTAMAAAf2B8q+ZTHEwAAAABJRU5ErkJggg==') no-repeat center center;
        }

        .tab-custom-select__open-btn_opened {
            background: url('data:image/png;base64,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') no-repeat center center;
        }

        .tab-custom-select__open-btn_when-multi-select-opened {
            background: url('data:image/png;base64,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') no-repeat center center;
        }

        .tab-custom-select__list {
            display: none;
            position: absolute;
            list-style-type: none;
            z-index: 100;

            overflow: auto;
            overflow-x: hidden;
            padding: 0;

            border: 1px solid #dadada;
            border-radius: 4px;

            box-shadow: 0 0 10px 0 #dadada;
            background-color: white;
        }

        .tab-custom-select__list-item {
            display: block;
            overflow-x: hidden;

            min-height: 24px;
            padding: 5px 0;

            color: black;
            white-space: nowrap;

            background: transparent;
            cursor: pointer;
        }

        .tab-custom-select__list-selected-item-indicator {
            float: left;

            width: 15px;
            height: 15px;
            margin-top: 2px;
            margin-right: 10px;

            font-size: 10px;
            text-align: center;
            color: white;

            border: 1px solid #dce0e4;
            border-radius: 2px;

            background: transparent;
        }

        .tab-custom-select__list-item_selected .tab-custom-select__list-selected-item-indicator {
            background: #fca54e;
        }

        .tab-custom-select__list-item-button {
            float: left;

            width: 30px;
            height: 20px;

            font-size: 8px;
            text-align: center;
            color: black;

            border: none;

            background: transparent;
            cursor: pointer;
        }

        .tab-custom-select__list-item-folder {
            float: left;

            width: 30px;
            height: 20px;

            font-size: 12px;
            text-align: center;
            color: black;

            border: none;

            background: transparent;
            cursor: pointer;
        }

        .tab-custom-select__list-item_selected .tab-custom-select__list-item-button {
            color: black;
        }

        .cd-section-content .ui-datepicker {
            width: 362px;
            height: 315px;

            padding: 0;
        }

        .cd-section-content .ui-widget-header {
            padding: 17px 0;

            border: none;
            border-bottom: 1px solid #e5e9f2;

            background: transparent;
        }

        .cd-section-content .ui-datepicker-prev {
            left: auto;
            right: 50px;
            width: 50px;
            height: 50px;
            border: none;
            border-left: 1px solid #e5e9f2;
            border-right: 1px solid #e5e9f2;
            border-radius: 0;
            cursor: pointer;
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wcTCwAzHw1pGgAAAKdJREFUSMdjYBgFo2DQA0ZSNfyfZyj699vv9QyMDB9Zsq94E1LPRKrh/77/2s/A8N+a4T8DPzF6WEg1/P9/Bm1GRoarTJysgVQLIkzD2RwZk86/pooF/6frif3793cfOYYTFwfszP9pnopoGkSolvze9///fx1SLCE6mTImnX/NxMnqxMjIcPX/fwbtv99+r6dOHGBYwubIwMB4lIGR4eNoOTUKhgkAAFvKVBnVxwCrAAAAAElFTkSuQmCC') no-repeat center center;
        }

        .cd-section-content .ui-datepicker-next {
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 0;
            cursor: pointer;
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4wcTCwEGUKWceAAAAJtJREFUSMftkjsSgkAQRLsXsQoSIk6BCbGRR+AK3smUKxiZSmRsxCmMTNySz45XmEEDqdoXd/Wr+QCRyN9DTWg67S4QFEmeNjzeHxaBU6UEBSD74IdO2rr8uSDJ04ZEL4Iq+PFqkVAblLYugx86EVQkepdtD5p10TLuEon76kXeM9exoqXlALDRhObXeAbs5fobEE+AN2t5JLISPtg7UAsEnXeNAAAAAElFTkSuQmCC') no-repeat center center;
        }

        .cd-section-content .ui-datepicker-title {
            font-size: 16px;
            font-weight: 500;
            line-height: 1.13;
            color: #182c4f;
        }

        .cd-section-content .ui-datepicker .ui-datepicker-title {
            margin: 0;
            margin-left: 20px;

            text-align: left;
        }

        .cd-section-content .ui-state-default {
            height: 34px;
            width: 34px;
            padding-top: 7px;
            margin-left: 7px;

            text-align: center;

            border: none;

            background: transparent;
            color: #454545;
        }

        .cd-section-content .ui-state-active {
            color: white !important;

            border-radius: 3px;

            background: #fca54e !important;
        }

        .cd-section-content .ui-state-highlight {
            color: white !important;
            border-radius: 3px;
            background: #ffd028 !important;
        }

        .cd-header-menu {
            width: 100%;
            height: 60px;
            padding: 16px 0 0 12px;
        }

        .cd-header-menu__label {
            float: left;

            height: 32px;

            padding: 0;
            margin: 0;
        }

        .cd-header-menu__text {
            float: left;

            height: 32px;

            font-size: 14px;
            font-weight: 600;
            line-height: 2.29;

            color: black;
        }

        .cd-header-menu__input-container {
            display: inline;
            float: left;
            height: 32px;
            margin-left: 24px;
            cursor: pointer;
            border-bottom: 2px solid;
        }

        .cd-header-menu__input {
            float: left;

            width: 157px;
            height: 30px;

            font-size: 13px;
            font-weight: 600;
            line-height: 2.46;
            color: black;

            border: none;

            background-color: transparent;
            cursor: pointer;
        }

        .cd-header-menu__calendar-btn {
            float: left;
            width: 24px;
            height: 24px;
            padding: 0;
            margin-top: 4px;
            border: none;
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQZJREFUSA3tVN0RgjAMTgpj6ATiIB57+OAxDseDc4gOAk6gY0gj4S53JbSAnh4v9CU//b6kSdsArGvpDqA+ABX7g7V0JqAN78XZvcO88h25WO1HwKcxeMRTdXNxgwRNnjwkOAMjMCkYwsbSxSX6/Jwkyuqti4tdg3U3ONsN2BIsa/3l82suM0yf9nvr7wkGLZIauMeYVVexxyQVSarvSPDBCuYG50B4qksJqGUwgQD5ecoTDemC9cnJBD7SJ77gHUgQ+VBsh3TB+uRkBaG2uH5fYPFNJhDgt3K5FvHbnnvqMeygAh5YPFP447R9npWjxXY45mrC4A66kesBaqK2ZVxr/2ov34E3GId3Ag4XMvsAAAAASUVORK5CYII=');
            cursor: pointer;
        }

        .cd-datepicker {
            position: absolute;
            top: 50px;
            left: 20px;
            z-index: 999999;
            background-color: transparent;
        }

        .cd-hidden {
            display: none;
        }

        .links-list {
            padding: 0 12px 0 12px;
            list-style-type: none;
            text-decoration: underline;
            color: #1A78E2;
        }

        .links-list__link {
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 400;
            line-height: 18px;
            cursor: pointer;
        }

        .chart-sidebar {
            width: 155px;
            vertical-align: top;
        }

        .chart-sidebar-content {
            width: 153px;
            border-collapse: collapse;
        }

        .chart-sidebar-content__item {
            height: 32px;
            cursor: pointer;
            color: #767784;
        }

        .chart-sidebar-content__icon-container {
            width: 32px;
            vertical-align: middle;
        }

        .chart-sidebar-content__icon_with-margin-left {
            margin-left: 7.5px;
        }

        .chart-sidebar-content__title-container {
            padding-left: 2.5px;
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
        }

        .chart-sidebar-content__marker {
            width: 4px;
        }

        .cd-header-menu__label {
            width: 208px;
        }

        .cd-header-menu__input {
            width: 120px;
        }


        .colors-font {
            color: #1A78E2 !important;
        }

        .colors-primary-font {
            color: #278cff !important;
        }

        .colors-selection {
            border-bottom: solid 2px #1A78E2 !important;
        }

        .colors-primary {
            background-color: #278cff !important;
        }

        .colors-secondary {
            background-color: #1A78E2 !important;
        }

        .colors-secondary-faded {
            background-color: #1A78E214 !important;
        }

        .tab-custom-select__input-container {
            border-bottom: 2px solid #1A78E2;
        }

        .tab-custom-select__list-item_selected .tab-custom-select__list-selected-item-indicator {
            background: #278cff;
        }

        .tab-custom-select__open-btn {
            background: url('data:image/png;base64,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6wTwPgNXWsdfbQKzn6Q3Olr4CBjYBi6uO5q8B1zuAENPumRItuSlKRQKwPsZfVMOGLwF+tec3tr7OH0AMtTV8g1wcAiMFil73eXd/u7e/j3T7u8Hl95ytqqWOzEAAA0YaVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/Pgo8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAgQ29yZSA0LjQuMC1FeGl2MiI+CiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczpHSU1QPSJodHRwOi8vd3d3LmdpbXAub3JnL3htcC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgeG1wTU06RG9jdW1lbnRJRD0iZ2ltcDpkb2NpZDpnaW1wOmVkNmNjMmRmLTc0NTEtNGRkZi1hNDEwLTBhMDI1ZjFiZGI2OCIKICAgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDphZTU3ZDhkMy00N2Y3LTRhOTMtYTYwZi01ZDExNDhkNDM5NTUiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDoxYTYxM2ViZi1jZmFmLTRiZjUtYTlhMS0zZmNjNzU2MmI3OWMiCiAgIGRjOkZvcm1hdD0iaW1hZ2UvcG5nIgogICBHSU1QOkFQST0iMi4wIgogICBHSU1QOlBsYXRmb3JtPSJXaW5kb3dzIgogICBHSU1QOlRpbWVTdGFtcD0iMTY1NDY5Njk3NjA0NjM3OCIKICAgR0lNUDpWZXJzaW9uPSIyLjEwLjMwIgogICB0aWZmOk9yaWVudGF0aW9uPSIxIgogICB4bXA6Q3JlYXRvclRvb2w9IkdJTVAgMi4xMCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDpjaGFuZ2VkPSIvIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmQ2NWFhMjgwLWI1NTAtNDU1MC05NGY3LTczMWIzZTJmNDBkMyIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iR2ltcCAyLjEwIChXaW5kb3dzKSIKICAgICAgc3RFdnQ6d2hlbj0iMjAyMi0wNi0wOFQxOTowMjo1NiIvPgogICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz6Vb6CiAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH5gYIDgI4Vpd4ZgAAAQJJREFUSMdjYBgFo2AUYAU2lff9/8/UYSRG7f+51izxNdfDcMljGCJV8ciXgYGhjYGBQUeH6XfQrjbl9bg0m1Xe93/yn3kDAwPDTh6G/1NvdchvJmgBAwMDg1rFQ98vDIybGBgYGOyZv4cub1Vfg8dwBhHGf/6X2hU2YTOLCZvgrQ75zTKMfwMYGBheH/zLuTq2+kYosrx/9e0gYgzH6QPkuLgHNciV5Wv4whbNVchi6ox/Ave3K23AZwbBiPSquhN44R/bOgYGBgYTpp/BZ/6xr4WxN7WpriOkn6iU4lh5L+DmfxZ4ZBNrOEnAq+pOoFTFo/9B1beCaZo/RkuJUTAMAQDWTWLuQOsc4AAAAABJRU5ErkJggg==') no-repeat center center;
        }

        .tab-custom-select__open-btn_opened {
            background: url('data:image/png;base64,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vljWRwTw7QKthmV9H1tW6wTwPgNXWsdfbQKzn6Q3Olr4CBjYBi6uO5q8B1zuAENPumRItuSlKRQKwPsZfVMOGLwF+tec3tr7OH0AMtTV8g1wcAiMFil73eXd/u7e/j3T7u8Hl95ytqqWOzEAAA0YaVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/Pgo8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAgQ29yZSA0LjQuMC1FeGl2MiI+CiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczpHSU1QPSJodHRwOi8vd3d3LmdpbXAub3JnL3htcC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgeG1wTU06RG9jdW1lbnRJRD0iZ2ltcDpkb2NpZDpnaW1wOjNkMGY3ZWUxLTYyMDAtNGJhNi04MGZmLWEwZWZkYzljMzk3ZiIKICAgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozYTRlMjdkYy02MjQ1LTQzN2QtYTM1Ni0yN2YwNWFlMjZkNTAiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowMzZkNzQxOC03OTQ2LTQ2ZWEtOWM1OS0wMTdkOWIzNDc3M2YiCiAgIGRjOkZvcm1hdD0iaW1hZ2UvcG5nIgogICBHSU1QOkFQST0iMi4wIgogICBHSU1QOlBsYXRmb3JtPSJXaW5kb3dzIgogICBHSU1QOlRpbWVTdGFtcD0iMTY1NDY5NzIwNzQxNjM1MiIKICAgR0lNUDpWZXJzaW9uPSIyLjEwLjMwIgogICB0aWZmOk9yaWVudGF0aW9uPSIxIgogICB4bXA6Q3JlYXRvclRvb2w9IkdJTVAgMi4xMCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDpjaGFuZ2VkPSIvIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmE0ZDNhODE3LWFkYzItNDBlZC1iZWIwLWU0NDYyYWNlYTExYyIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iR2ltcCAyLjEwIChXaW5kb3dzKSIKICAgICAgc3RFdnQ6d2hlbj0iMjAyMi0wNi0wOFQxOTowNjo0NyIvPgogICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz59MVBSAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH5gYIDgYvsSg4pQAAAQxJREFUSMdjYBgFo2D4AZvK+/6kqGciRXFQ9a3ge/+ZN3hV3QkkVg8jsQr9qm4HnfnHvhbGV2f8E7i/XWkDVXyAbLgJ089gBgYGhpv/WdYT4xOCFjhW3guAGa7E+DdgU5vqOleWr+EMDAwMF/6xrSMUJ3gt0Kt84HfzP8t6BgYGBlPmn8FH2hU3MjAwMCxs0VzlzPwtjIGBgeHef+bZZngsYcRn+Jv/TBsZGBgYZBj/BpyCGo4MIqtvhhz8y7magYGBgYfhv9+tDvnNRPlAreKh75v/TFn4DGdgYGBY3qq+RofpdxADAwPDFwbGNqmKR75EJ8n4muth/+dasxCj9v9MHUZS88coGAUjCQAAcUNei8wseVAAAAAASUVORK5CYII=') no-repeat center center;
        }

        .cd-header-menu__calendar-btn {
            background: url('data:image/png;base64,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Ngs8M2RkUvPEIWKx2MVyF7OSoRJPE4cVVaN8IeuwwnmLs1qps/Y9+QsDeW0lzXWaI4hjCQkkIUJGHWVUUEOUVo0UEynaj7n4h21/klwyucpg5FhAFSok2w/+B7+7NQtTk05SIAb0vljWRwTw7QKthmV9H1tW6wTwPgNXWsdfbQKzn6Q3Olr4CBjYBi6uO5q8B1zuAENPumRItuSlKRQKwPsZfVMOGLwF+tec3tr7OH0AMtTV8g1wcAiMFil73eXd/u7e/j3T7u8Hl95ytqqWOzEAAA0YaVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/Pgo8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAgQ29yZSA0LjQuMC1FeGl2MiI+CiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczpHSU1QPSJodHRwOi8vd3d3LmdpbXAub3JnL3htcC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgeG1wTU06RG9jdW1lbnRJRD0iZ2ltcDpkb2NpZDpnaW1wOjMyZDExZWNjLTk1ZjAtNGRlNi04YTliLTY3MjVkOTVhYzJlMyIKICAgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0MTBjYjJjNi1hYTU5LTQ2YzAtOWE2ZS02ZGEwODcwZjQ2YzUiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo5N2MzOTJjZC0xZjg4LTRjMjgtODFjMy04MDVjNWJmYjc1YTgiCiAgIGRjOkZvcm1hdD0iaW1hZ2UvcG5nIgogICBHSU1QOkFQST0iMi4wIgogICBHSU1QOlBsYXRmb3JtPSJXaW5kb3dzIgogICBHSU1QOlRpbWVTdGFtcD0iMTY1NDY5NTU1NTI0NDcyOSIKICAgR0lNUDpWZXJzaW9uPSIyLjEwLjMwIgogICB0aWZmOk9yaWVudGF0aW9uPSIxIgogICB4bXA6Q3JlYXRvclRvb2w9IkdJTVAgMi4xMCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDpjaGFuZ2VkPSIvIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjhlODZjYTc3LWQwOWQtNDIyNi1hZTEwLThkMjMxMWQ4NWQ3NCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iR2ltcCAyLjEwIChXaW5kb3dzKSIKICAgICAgc3RFdnQ6d2hlbj0iMjAyMi0wNi0wOFQxODozOToxNSIvPgogICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz5oBaVfAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH5gYIDScPBJ+z1wAAAF1JREFUSMdjYBgFAw0Y0QWkKh79R+Y/65BjJEecaAtIBegWMNE6iIa+BSykhCcugC/emCg1nJBaJmJcB3MhLvbgjQN07+NiU+SD0SBiIidtk6KWhVyNg6aoGAUDDwDg5kVMrSdMSwAAAABJRU5ErkJggg==');
        }

        .cd-section-content .ui-state-highlight {
            background: #64bfed !important;
        }

        .cd-section-content .ui-state-active {
            background: #278cff !important;
        }

        .cd-section-content .ui-datepicker-prev {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAALCAYAAABCm8wlAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAACpSURBVHgBfZA9DoJQEIRnnyZaUvpTCEfwCJzAeAI9gh0xFmhlPIYnIZ6ER2MsaTQUsiPPRIMEnGZ/vsnuZgUtmm6zDWgW9+K57DfhJMr2pMQAMRzAM00IcRBQ4fp2Cqx0wuPs7HL5B52MH6ceRVbvisiheqmvNfYQ5GQZErDVPM+ISUZR6n8M3xtcU6SXVI0K0io1/DmyzfQodC7NP9RNyjJAl8a768zFF1Q+S3Ef7VcJAAAAAElFTkSuQmCC') no-repeat center center;
        }

        .cd-section-content .ui-datepicker-next {
            background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAALCAYAAABCm8wlAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAACXSURBVHgBdY+9DcIwEIXfOQukjNKQjMIkwAZ0pgPKdGzACIwAm9gICaXMAsnFvvwoiexXnJ71Pp+fAadc/165/t4QEGXaFIoSIyfm+7/arUBVV6Xt0J4GnK7bTTSZ7GKOCslzu4mWdAhSq0aMj5tWLOGQnk06A2PZt7MFgy1zt28eZUOx0JeXX8iIhJL527EQy/d9IQTUAww1UpuX0keGAAAAAElFTkSuQmCC') no-repeat center center;
        }
		#tabPanel_2 .big-data-block__data-set-switcher__button {
			color: #000000;
			border-bottom: solid 2px #1A78E2;
		}

    </style>

    <script>
        // _ перед переменной или функцией означает, что эту переменную лучше не трогать, ибо она подразумевалась приватной

        var _customSelectArray = [];
        var _customSelectIdsCounter = 0;

        function _customSelectGetChildrenCount(selectIndex, folderIndex) {
            var folderLevel = _customSelectArray[selectIndex].data[folderIndex].level;
            var selectData = _customSelectArray[selectIndex].data;
            var counter = 0;

            for (var i = folderIndex + 1; i < selectData.length && selectData[i].level > folderLevel; ++i) {
                if (selectData[i].isFolder) {
                    var childrenCount = _customSelectGetChildrenCount(selectIndex, i);

                    counter += childrenCount;
                    i += childrenCount;
                }

                ++counter;
            }

            return counter;
        }

        function _customSelectGetFolderState(selectIndex, folderIndex) {
            var folderLevel = _customSelectArray[selectIndex].data[folderIndex].level;
            var selectData = _customSelectArray[selectIndex].data;

            // Раскоментить, если понадобится ставить галочку, когда выделена только папка, но не потомки
            // if (selectData[folderIndex].selected) {
            //     return true;
            // }

            for (var i = folderIndex + 1; i < selectData.length && selectData[i].level > folderLevel; ++i) {
                if (selectData[i].selected) {
                    return true;
                }
            }

            return false;
        }

        function _customSelectRenderItem(data, selectIndex, itemIndex) {
            var options = _customSelectArray[selectIndex].options;
            var tooltip = _customSelectArray[selectIndex].data[itemIndex].tooltip ? ' title="' + _customSelectArray[selectIndex].data[itemIndex].tooltip + '"' : ''
            var newItem = '';

            newItem += '<li data-index="' + itemIndex + '"' + tooltip + ' data-id="' + data[itemIndex].id + '" style="padding-left: ' +
                ((data[itemIndex].isFolder && !data[itemIndex].selected ? 0 : options.itemPaddingLeft) + data[itemIndex].level * 15) +
                'px; height: ' + options.itemHeight + 'px" class="' + options.cssPrefix + 'custom-select__list-item ' + options.cssPrefix + 'custom-select__font-style';

            if (data[itemIndex].selected) {
                newItem += ' ' + options.cssPrefix + 'custom-select__list-item_selected';
            }

            if (data[itemIndex].isFolder) {
                newItem += '" onclick="_customSelectItemClick(event, ' + selectIndex + ', ' + itemIndex + ', false)">' + (!data[itemIndex].selected ?
                    '<div class="' + options.cssPrefix + 'custom-select__list-item-indicator">' + (_customSelectGetFolderState(selectIndex, itemIndex) ? '&#10004;' : '') +
                    '</div><button class="' + options.cssPrefix + 'custom-select__list-item-button">' + (data[itemIndex].isOpened ? '&#9660;' : '&#9654;') +
                    '</button>' : '') + data[itemIndex].text + '</li>';
            } else {
                newItem += '" onclick="_customSelectItemClick(event, ' + selectIndex + ', ' + itemIndex + ', false)">' +
                    (options.indicatorForSelectedItems ? '<div class="' + options.cssPrefix + 'custom-select__list-selected-item-indicator">' +
                        (data[itemIndex].selected ? '&#10004;' : '') + '</div>' : '') +
                    data[itemIndex].text + '</li>';
            }

            return newItem;
        }

        function _customSelectUpdateList(selectIndex, selectListRef, endOfSearch) {
            // Фикс ошибки tagName is null (для Chrome) или g is null (для Firefox)
            // Проблема происходит из-за конфликта js кода веб-клиента 1С (а именно обработчика каждого клика в 1С) и js кода html
            // Это происходит из-за неправильной последовательности воспроизведения кода в очереди событий браузера
            // В данном случае сначала воспроизводится обработка клика от html (в ней элемент пересоздаётся),
            // потом 1С пытается произвести обработку события клика в документе, но элемента, по которому мы кликнули уже не существует
            // Далее ошибка, текст которой зависит от браузера (движок в тонком клиенте 1С вообще её не воспроизводит)
            // Сам фикс заключается в том, чтобы пересоздание элемента перенести в конец очереди событий с помощью setTimeout 0
            setTimeout(function() {
                var options = _customSelectArray[selectIndex].options;
                selectListRef = selectListRef ? selectListRef : $('.custom-select[data-index=' + selectIndex + '] .' + options.cssPrefix + 'custom-select__list');
                var newItems = '';
                var visibleItemsCount = 0;
                var data = _customSelectArray[selectIndex].data;

                for (var i = 0; i < data.length; ++i) {
                    var condition;

                    if (endOfSearch) {
                        condition = data[i].isVisibleInFolder;
                        data[i].isVisibleForSearch = true;
                    } else {
                        condition = data[i].isVisibleInFolder && data[i].isVisibleForSearch;
                    }

                    if (condition) {
                        newItems += _customSelectRenderItem(data, selectIndex, i);
                    }

                    if (data[i].isVisibleInFolder && data[i].isVisibleForSearch) {
                        ++visibleItemsCount;
                    }
                }

                selectListRef.html(newItems);

                if (visibleItemsCount > 10) {
                    selectListRef.css('height',  options.maxItemsCount * options.itemHeight + 3 + 'px');

                    if (_customSelectArray[selectIndex].options.altOpenMode) {
                        var altTop = $('.custom-select[data-index=' + selectIndex + ']').position().top - (options.maxItemsCount * options.itemHeight + 3) +
                            options.inputHeight + 2;

                        selectListRef.css('top', altTop + 'px');
                    }
                } else {
                    selectListRef.css('height', (visibleItemsCount * options.itemHeight + 2) + 'px');

                    if (_customSelectArray[selectIndex].options.altOpenMode) {
                        var altTop = $('.custom-select[data-index=' + selectIndex + ']').position().top - (visibleItemsCount * options.itemHeight + 2) +
                            options.inputHeight + 2;

                        selectListRef.css('top', altTop + 'px');
                    }
                }
            }, 0);
        }

        function _customSelectOpenFolder(selectIndex, folderIndex, isOpened) {
            var data = _customSelectArray[selectIndex].data;
            var folderLevel = data[folderIndex].level;
            var counter = 0;

            if (isOpened !== undefined && isOpened !== null) {
                data[folderIndex].isOpened = isOpened;
            } else {
                data[folderIndex].isOpened = !data[folderIndex].isOpened;
            }

            if (data[folderIndex].isOpened) {
                for (var i = folderIndex + 1; i < data.length && data[i].level > folderLevel; ++i) {
                    data[i].isVisibleInFolder = true;

                    if (data[i].isFolder) {
                        i += _customSelectOpenFolder(selectIndex, i, data[i].isOpened);
                    }

                    ++counter;
                }
            } else {
                for (var i = folderIndex + 1; i < data.length && data[i].level > folderLevel; ++i) {
                    data[i].isVisibleInFolder = false;

                    ++counter;
                }
            }

            _customSelectUpdateList(selectIndex);

            return counter;
        }

        function _customSelectInputTotalCalc(data, options) {
            var customSelectCounter = 0;

            for (var i = 0, levelChecker = -1; i < data.length; ++i) {
                if (data[i].selected && (levelChecker >= 0 ? data[i].level <= levelChecker : true)) {
                    levelChecker = -1;

                    if (data[i].isFolder) {
                        if (options.canSelectFolder) {
                            levelChecker = data[i].level;

                            ++customSelectCounter;
                        }
                    } else {
                        ++customSelectCounter;
                    }
                }
            }

            return customSelectCounter;
        }

        function _customSelectUpdateInput(selectRef, selectIndex, needToClear) {
            selectIndex = selectIndex ? selectIndex : +selectRef.attr('data-index');
            var options = _customSelectArray[selectIndex].options;

            if (needToClear) {
                selectRef.find('.' + options.cssPrefix + 'custom-select__input').val('');
            } else {
                if (options.multiSelect) {
                    selectRef.find('.' + options.cssPrefix + 'custom-select__input').val('Выбрано ' +
                        _customSelectInputTotalCalc(_customSelectArray[selectIndex].data, options) + ' из ' + _customSelectArray[selectIndex].data.length);
                } else {
                    for (var i = 0; i < _customSelectArray[selectIndex].data.length; ++i) {
                        if (_customSelectArray[selectIndex].data[i].selected) {
                            selectRef.find('.' + options.cssPrefix + 'custom-select__input').val(_customSelectArray[selectIndex].data[i].text);

                            break;
                        }
                    }
                }
            }
        }

        function closeAllCustomSelects() {
            $('.custom-select__list_opened').each(function(index, elem) {
                var selectListRef = $(elem);
                var selectRef = selectListRef.parent();
                var selectIndex = selectRef.attr('data-index');
                var options = _customSelectArray[selectIndex].options;
                var selectBtnRef = selectRef.find('.' + options.cssPrefix + 'custom-select__open-btn');

                selectListRef.removeClass('custom-select__list_opened');

                if (selectBtnRef.hasClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select')) {
                    selectBtnRef.removeClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select-opened');
                } else {
                    selectBtnRef.removeClass('' + options.cssPrefix + 'custom-select__open-btn_opened');
                }

                _customSelectUpdateList(selectIndex, selectListRef, true);
                _customSelectUpdateInput(selectRef);
            });
        }

        function getSelectedIdsFromCustomSelect() {
            var result = [];

            $.each(_customSelectArray, function(index, select) {
                var customSelectResultSelectRef = { id: select.options.id, data: [] };

                for (var j = 0; j < select.data.length; ++j) {
                    if (select.data[j].selected) {
                        customSelectResultSelectRef.data.push(select.data[j].id);

                        if (select.data[j].isFolder) {
                            j += _customSelectGetChildrenCount(index, j);
                        }
                    }

                }

                result.push(customSelectResultSelectRef);
            });

            return result;
        }

        function _customSelectOpen(selectIndex, onlyOpen) {
            var options = _customSelectArray[selectIndex].options;
            var customSelectRef = $('.custom-select[data-index=' + selectIndex + ']');
            var customSelectListRef = customSelectRef.find('.' + options.cssPrefix + 'custom-select__list');
            var customSelectBtnRef = customSelectRef.find('.' + options.cssPrefix + 'custom-select__open-btn');

            if (customSelectListRef.hasClass('custom-select__list_opened')) {
                if (!onlyOpen) {
                    customSelectListRef.removeClass('custom-select__list_opened');

                    if (customSelectBtnRef.hasClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select')) {
                        customSelectBtnRef.removeClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select-opened');
                    } else {
                        customSelectBtnRef.removeClass('' + options.cssPrefix + 'custom-select__open-btn_opened');
                    }

                    _customSelectUpdateList(selectIndex, customSelectListRef);
                    _customSelectUpdateInput(customSelectRef, selectIndex);
                }
            } else {
                closeAllCustomSelects();
                _customSelectUpdateInput(customSelectRef, selectIndex, true);

                if (_customSelectArray[selectIndex].options.altOpenMode) {
                    var listHeightString = customSelectListRef.css('height');
                    var listHeight = +listHeightString.substring(0, listHeightString.length - 2);
                    var altTop = customSelectRef.position().top - listHeight + options.inputHeight + 2;

                    customSelectListRef.css('top', altTop + 'px');
                }

                customSelectListRef.addClass('custom-select__list_opened');

                if (customSelectBtnRef.hasClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select')) {
                    customSelectBtnRef.addClass('' + options.cssPrefix + 'custom-select__open-btn_when-multi-select-opened');
                } else {
                    customSelectBtnRef.addClass('' + options.cssPrefix + 'custom-select__open-btn_opened');
                }
            }
        }

        function customSelectMultiSelect(values, needToUpdateInputs, withDefaultValues) {
            for (var j = 0; j < _customSelectArray.length; ++j) {
                var select = _customSelectArray[j];
                var options = select.options;
                var selectRef = $('.custom-select[data-index=' + j + ']');

                if (select.options.multiSelect) {
                    if (values && values[j] && values[j].length > 0) {
                        var valueIndex = 0;

                        for (var i = 0; i < select.data.length; ++i) {
                            if (i === values[j][valueIndex]) {
                                if (!select.data[i].selected && (!select.data[i].isFolder || select.options.canSelectFolder)) {
                                    select.data[i].selected = true;

                                    if (select.data[i].isFolder) {
                                        _customSelectOpenFolder(j, i, false);
                                    }
                                }

                                if (valueIndex + 1 < values[j].length) {
                                    ++valueIndex;
                                }
                            } else {
                                if (select.data[i].selected) {
                                    select.data[i].selected = false;
                                }
                            }
                        }
                    } else if (withDefaultValues) {
                        for (var i = 0; i < select.data.length; ++i) {
                            if (select.data[i].selected) {
                                select.data[i].selected = false;
                            }
                        }
                    }
                } else {
                    if (values && values[j] && values[j].length > 0) {
                        var selectedElemFlag = false;
                        var unselectedElemFlag = false;
                        var firstElemIndex = -1;

                        for (var i = 0; i < select.data.length; ++i) {
                            if (selectedElemFlag && unselectedElemFlag) {
                                break;
                            }

                            if (i === values[j][0]) {
                                if (!select.data[i].isFolder || select.options.canSelectFolder) {
                                    if (!select.data[i].selected) {
                                        select.data[i].selected = true;

                                        if (select.data[i].isFolder) {
                                            _customSelectOpenFolder(j, i, false);
                                        }
                                    } else {
                                        unselectedElemFlag = true;
                                    }

                                    selectedElemFlag = true;
                                }
                            } else {
                                if ((!select.data[i].isFolder || select.options.canSelectFolder) && firstElemIndex === -1) {
                                    firstElemIndex = i;
                                }

                                if (select.data[i].selected) {
                                    select.data[i].selected = false;
                                    unselectedElemFlag = true;
                                }
                            }
                        }

                        if (!selectedElemFlag && withDefaultValues && firstElemIndex > -1) {
                            select.data[firstElemIndex].selected = true;

                            if (select.data[firstElemIndex].isFolder) {
                                _customSelectOpenFolder(j, firstElemIndex, false);
                            }

                            selectedElemFlag = true;
                        }
                    } else if (withDefaultValues) {
                        var isFirstElem = true;

                        for (var i = 0; i < select.data.length; ++i) {
                            if (isFirstElem && (!select.data[i].isFolder || select.options.canSelectFolder)) {
                                isFirstElem = false;
                                select.data[i].selected = true;

                                if (select.data[i].isFolder) {
                                    _customSelectOpenFolder(j, i, false);
                                }
                            } else if (select.data[i].selected) {
                                select.data[i].selected = false;
                            }
                        }
                    }
                }

                if (needToUpdateInputs) {
                    _customSelectUpdateInput(selectRef, j);
                }

                _customSelectUpdateList(j, selectRef.find('.' + options.cssPrefix + 'custom-select__list'));
            }
        }

        function customSelectSelect(selectNumber, itemNumber, needToUpdateInput, byId) {
            var customSelectListRef;
            var customSelectRef;
            var customSelectListItemRef;
            var options;

            if (byId) {
                customSelectRef = $('.custom-select[data-id=' + selectNumber + ']');
                selectNumber = +customSelectRef.attr('data-index');
                options = _customSelectArray[selectNumber].options;

                customSelectListRef = customSelectRef.find('.' + options.cssPrefix + 'custom-select__list');
                customSelectListItemRef = customSelectListRef.find('.' + options.cssPrefix + 'custom-select__list-item[data-id=' + itemNumber + ']');
                itemNumber = customSelectListItemRef.attr('data-index');
            } else {
                options = _customSelectArray[selectNumber].options;

                customSelectListRef = $('.custom-select[data-index=' + selectNumber + '] .' + options.cssPrefix + 'custom-select__list');
                customSelectRef = customSelectListRef.parent();
                customSelectListItemRef = customSelectListRef.find('.' + options.cssPrefix + 'custom-select__list-item[data-index=' + itemNumber + ']');
            }

            var selectData = _customSelectArray[selectNumber].data;

            if (!selectData[itemNumber].isFolder || _customSelectArray[selectNumber].options.canSelectFolder) {
                if (!_customSelectArray[selectNumber].options.multiSelect) {
                    if (!selectData[itemNumber].selected) {
                        for (var i = 0; i < selectData.length; ++i) {
                            if (selectData[i].selected) {
                                selectData[i].selected = false;

                                break;
                            }
                        }

                        selectData[itemNumber].selected = true;

                        if (selectData[itemNumber].isFolder) {
                            _customSelectOpenFolder(selectNumber, itemNumber, false);
                        }
                    }
                } else {
                    if (!selectData[itemNumber].selected && selectData[itemNumber].isFolder) {
                        _customSelectOpenFolder(selectNumber, itemNumber, false);
                    }

                    selectData[itemNumber].selected = !selectData[itemNumber].selected;
                }

                if (needToUpdateInput) {
                    _customSelectUpdateInput(customSelectRef, selectNumber);
                }

                _customSelectUpdateList(selectNumber, customSelectListRef);
            }
        }

        function _customSelectSelectParentsInSearch(data, folderIndex) {
            var currentLevel = data[folderIndex].level;

            if (!data[folderIndex].isVisibleForSearch) {
                data[folderIndex].isVisibleForSearch = true;

                if (data[folderIndex].level !== 0) {
                    for (var i = folderIndex; i >= 0; --i) {
                        if (data[i].level < currentLevel && data[i].isFolder) {
                            if (!data[i].isVisibleForSearch) {
                                data[i].isVisibleForSearch = true;
                                currentLevel = data[i].level;

                                if (data[i].level === 0) {
                                    break;
                                }
                            } else {
                                break;
                            }
                        }
                    }
                }
            }
        }

        function _customSelectSearchRec(selectIndex, text, data, folderIndex, allSelectMode) {
            var result = false;
            var count = 0;

            if (allSelectMode) {
                for (var i = folderIndex + 1; i < data.length && data[i].level > data[folderIndex].level; ++i, ++count) {
                    data[i].isVisibleForSearch = true;

                    if (data[i].isFolder && data[i].selected) {
                        i += _customSelectGetChildrenCount(selectIndex, i);
                    }
                }

                result = true;
            } else {
                for (var i = folderIndex + 1; i < data.length && data[i].level > data[folderIndex].level; ++i, ++count) {
                    if (data[i].text.toLowerCase().indexOf(text.toLowerCase()) !== -1) {
                        data[i].isVisibleForSearch = true;
                        result = true;

                        if (data[i].isFolder) {
                            var shift = 0;

                            if (data[i].selected) {
                                shift = _customSelectGetChildrenCount(selectIndex, i);
                            } else {
                                _customSelectSelectParentsInSearch(data, i);

                                var lowLvlResult = _customSelectSearchRec(selectIndex, text, data, i, true);
                                shift = lowLvlResult.count;
                            }

                            i += shift;
                            count += shift;
                        }
                    } else {
                        data[i].isVisibleForSearch = false;

                        if (data[i].isFolder) {
                            var shift = 0;

                            if (data[i].selected) {
                                shift = _customSelectGetChildrenCount(selectIndex, i);
                            } else {
                                var lowLvlResult = _customSelectSearchRec(selectIndex, text, data, i);

                                if (lowLvlResult.result) {
                                    result = true;

                                    _customSelectSelectParentsInSearch(data, i);
                                }

                                shift = lowLvlResult.count;
                            }

                            i += shift;
                            count += shift;
                        }
                    }
                }
            }

            return { result: result, count: count };
        }

        function _customSelectSearch(event, selectIndex) {
            // Фикс для тонкого клиента, так как в тонком onkeyup не работает на кнопки с буквами
            // Поэтому для считывания актуального текста из инпута используется setTimeout, для считывания букв используется onkeypress,
            // а для специальных кнопок (backspace) используется onkeydown
            var input = event.srcElement;

            if (event.type === 'keypress' || event.type === 'keydown' && event.keyCode === 8) {
                setTimeout(function() {
                    var text = input.value;
                    var data = _customSelectArray[selectIndex].data;

                    for (var i = 0; i < data.length; ++i) {
                        if (data[i].text.toLowerCase().indexOf(text.toLowerCase()) !== -1) {
                            data[i].isVisibleForSearch = true;
                            result = true;

                            if (data[i].isFolder) {
                                _customSelectSelectParentsInSearch(data, i);

                                if (data[i].selected) {
                                    i += _customSelectGetChildrenCount(selectIndex, i);
                                } else {
                                    i += _customSelectSearchRec(selectIndex, text, data, i, true).count;
                                }
                            }
                        } else {
                            data[i].isVisibleForSearch = false;

                            if (data[i].isFolder) {
                                var shift = 0;

                                if (data[i].selected) {
                                    shift = _customSelectGetChildrenCount(selectIndex, i);
                                } else {
                                    var lowLvlResult = _customSelectSearchRec(selectIndex, text, data, i);

                                    if (lowLvlResult.result) {
                                        data[i].isVisibleForSearch = true;
                                        result = true;

                                        _customSelectSelectParentsInSearch(data, i);
                                    }

                                    shift = lowLvlResult.count;
                                }

                                i += shift;
                            }
                        }
                    }

                    _customSelectUpdateList(selectIndex);
                }, 0);
            }
        }

        function _transformCustomSelectDataRec(newData, data, level) {
            for (var i = 0; i < data.length; ++i) {
                if (data[i].children && data[i].children.length > 0) {
                    data[i].isFolder = true;
                }

                data[i].level = level;
                data[i].isVisibleInFolder = false;
                data[i].isVisibleForSearch = true;

                if (data[i].isFolder) {
                    data[i].isOpened = false;

                    newData.push(data[i]);

                    _transformCustomSelectDataRec(newData, data[i].children, level + 1);
                } else {
                    newData.push(data[i]);
                }
            }
        }

        function transformCustomSelectData(data) {
            newData = [];

            for (var i = 0; i < data.length; ++i) {
                if (data[i].children && data[i].children.length > 0) {
                    data[i].isFolder = true;
                }

                data[i].level = 0;
                data[i].isVisibleInFolder = true;
                data[i].isVisibleForSearch = true;

                if (data[i].isFolder) {
                    data[i].isOpened = false;

                    newData.push(data[i]);

                    _transformCustomSelectDataRec(newData, data[i].children, 1);
                } else {
                    newData.push(data[i]);
                }
            }

            return newData;
        }

        function _customSelectItemClick(tmp1, tmp2, flag, tmp3) {
            var sto = false;
            if(flag == 0)
                sto = true;
            startInitChart($('.chart-sidebar-content__item.colors-secondary-faded').text(), sto, true);
        }

        function createCustomSelect(parent, options, data) {
            var alreadyAdded = false;
            var selectIndex = 0;

            for (var i = 0; i < _customSelectArray.length; ++i) {
                var select = _customSelectArray[i];

                if (select.options.id === options.id) {
                    alreadyAdded = true;
                    selectIndex = i;
                    select.options = options;
                    select.data = data;

                    break;
                }
            }

            if (!alreadyAdded) {
                _customSelectArray.push({ options: options, data: data });

                selectIndex = _customSelectIdsCounter;
                ++_customSelectIdsCounter;
            }

            var customSelectInputText = data[0].text;

            if (!options.multiSelect) {
                var customSelectCounter = 0;
                var firstItemIndex = -1;

                for (var i = 0; i < data.length; ++i) {
                    if (!data[i].isFolder || options.canSelectFolder) {
                        if (firstItemIndex === -1) {
                            firstItemIndex = i;
                        }

                        if (data[i].selected) {
                            if (customSelectCounter === 0) {
                                ++customSelectCounter;

                                customSelectInputText = data[i].text;
                            } else {
                                data[i].selected = false;
                            }
                        }
                    } else {
                        data[i].selected = false;
                    }
                }

                if (customSelectCounter === 0 && firstItemIndex > -1) {
                    data[firstItemIndex].selected = true;
                    customSelectInputText = data[firstItemIndex].text;
                }
            } else {
                for (var i = 0; i < data.length; ++i) {
                    if (data[i].selected) {
                        if (data[i].isFolder && !options.canSelectFolder) {
                            data[i].selected = false;
                        }
                    }
                }

                customSelectInputText = 'Выбрано ' + _customSelectInputTotalCalc(data, options) + ' из ' + data.length;
            }

            if (!options.cssPrefix) {
                options.cssPrefix = '';
            } else {
                options.cssPrefix += '-';
            }

            if (!options.inputHeight) {
                options.inputHeight = 40;
            }

            if (!options.itemPaddingLeft) {
                options.itemPaddingLeft = 45;
            }

            if (!options.itemHeight) {
                options.itemHeight = 30;
            }

            if (!options.maxItemsCount) {
                options.maxItemsCount = 10;
            }

            var customSelectContainer = document.createElement("div");
            customSelectContainer.className = 'custom-select';
            customSelectContainer.setAttribute('data-index', selectIndex);
            customSelectContainer.setAttribute('data-id', options.id);
            var customSelectContent = '<label class="' + options.cssPrefix + 'custom-select__label">';

            if (options.name) {
                customSelectContent += '<span class="' + options.cssPrefix + 'custom-select__label-text">' + options.name + '</span>';
            }

            customSelectContent += '<div class="' + options.cssPrefix + 'custom-select__input-container" style="height: ' + options.inputHeight + 'px';

            if (options.color) {
                customSelectContent += '; background-color: ' + options.color + '"';
            } else {
                customSelectContent += '"';
            }

            customSelectContent += '><input style="height: ' + (options.inputHeight - 2) + 'px' +
                (options.inputWidth ? '; width: ' + options.inputWidth + 'px"' : '"') + ' class="' + options.cssPrefix + 'custom-select__input' +
                ' ' + options.cssPrefix + 'custom-select__font-style" type="text" autocomplete="off" onclick="_customSelectOpen(' + selectIndex +
                ', true)" onkeydown="_customSelectSearch(event, ' + selectIndex + ')" onkeypress="_customSelectSearch(event, ' + selectIndex + ')" value="' +
                customSelectInputText + '"><button style="height: ' + options.inputHeight + 'px" class="' + options.cssPrefix + 'custom-select__open-btn';

            var visibleItemsCount = 0;
            for (var i = 0; i < data.length; ++i) {
                if (data[i].isVisibleInFolder && data[i].isVisibleForSearch) {
                    ++visibleItemsCount;
                }
            }
            var listHeight = visibleItemsCount > options.maxItemsCount ? options.maxItemsCount * options.itemHeight + 3 : (visibleItemsCount * options.itemHeight + 2);
            var customSelectUl = '<ul class="' + options.cssPrefix + 'custom-select__list" style="height: ' + listHeight + 'px';

            if (options.listWidth) {
                customSelectUl += '; width: ' + options.listWidth + 'px';
            }

            if (options.color) {
                customSelectUl += '; background-color: ' + options.color + '">';
            } else {
                customSelectUl += '">';
            }

            if (options.multiSelect) {
                customSelectContent += ' ' + options.cssPrefix + 'custom-select__open-btn_when-multi-select" onclick="_customSelectOpen(' + selectIndex +
                    ')"></button></div></label>' +
                    customSelectUl;
            } else {
                customSelectContent += '" onclick="_customSelectOpen(' + selectIndex +')"></button></div></label>' + customSelectUl;
            }

            for (var i = 0; i < data.length; ++i) {
                if (data[i].isVisibleInFolder) {
                    customSelectContent += _customSelectRenderItem(data, selectIndex, i);
                }
            }

            customSelectContent += '</ul>'

            customSelectContainer.innerHTML = customSelectContent;
            parent.appendChild(customSelectContainer);
        }

        function renderTabSection(parent, options) {
            var tabSection = options.tabSection;
            var table = document.createElement("table");
            table.id = "tabPanel_" + options.id;
            table.className = "big-data-block__section-switcher__panel";
            table.setAttribute("type", "parentPanel");

            var tbody = document.createElement("tbody");
            tbody.className = "big-data-block__sections-switcher_tbody";
            var switcherRow = document.createElement("tr");
            $(switcherRow).css("display", "block");

            var rightSwitcherTd = document.createElement("td");
            var leftSwitcherTd = document.createElement("td");

            var rightTable = document.createElement("table");
            var rightTableBody = document.createElement("tbody");
            var rightTableRow = document.createElement("tr");
            rightTableBody.appendChild(rightTableRow);
            rightTable.appendChild(rightTableBody);
            rightSwitcherTd.appendChild(rightTable);
            $(rightSwitcherTd).css("width", "100%");

            var leftTable = document.createElement("table");
            var leftTableBody = document.createElement("tbody");
            var leftTableRow = document.createElement("tr");
            leftTableBody.appendChild(leftTableRow);
            leftTable.appendChild(leftTableBody);
            leftSwitcherTd.appendChild(leftTable);

            for (var i = 0; i < tabSection.length; i++) {
                var switcherTd = document.createElement("td");
                switcherTd.setAttribute("id", "tabPanel_" + i);
                switcherTd.setAttribute("type", tabSection[i].type);
                var mainDiv = document.createElement("div");

                if (tabSection[i].marginLeft) {
                    $(mainDiv).css("margin-left", tabSection[i].marginLeft);
                }
                if (tabSection[i].marginRight) {
                    $(mainDiv).css("margin-right", tabSection[i].marginRight);
                }

                if (tabSection[i].type === "tabPanel") {
                    _appendTabPanel(tabSection, i, mainDiv);
                }

                if (tabSection[i].type === "comboBox") {
                    _appendComboBox(tabSection, i, mainDiv);
                }

                if (tabSection[i].type === "customComboBox") {
                    _appendCustomComboBox(tabSection, i, mainDiv);
                }

                if (tabSection[i].type === "legend") {
                    mainDiv.appendChild(getLegendTableHorizontal(options.dataSets[0].series, tabSection[i].itemWidth));
                }

                if (tabSection[i].type === "datepicker") {
                    _appendDatepicker(tabSection, i, mainDiv);
                }

                switcherTd.appendChild(mainDiv);

                if (tabSection[i].rightTab) {
                    rightTableRow.appendChild(switcherTd);
                } else {
                    leftTableRow.appendChild(switcherTd);
                }
            }
            switcherRow.appendChild(rightSwitcherTd);
            switcherRow.appendChild(leftSwitcherTd);
            tbody.appendChild(switcherRow);
            table.appendChild(tbody);

            parent.appendChild(table);

            var chartContainer = document.createElement("div");
            chartContainer.className = "highcharts-container";

            height = ($(parent).height() - $($("#tabPanel_" + options.id)[0]).height() - 8);

            if (height < 100) { // костыль для IE5
                height = 650;
            }

            //$(chartContainer).css("height", height + 'px');

            parent.appendChild(chartContainer);

            return chartContainer;
        }

        function _appendDatepicker(sections, sectionIndex, parent) {
            var section = sections[sectionIndex];
            var id = section.id;
            var type = section.type;
            var caption = section.caption;
            var selectedDate = section.selectedDate;

            var $datepickerContainer = $(document.createElement('div'));
            var $datepickerLabel = $(document.createElement('label'));
            var $datepickerLabelText = $(document.createElement('span'));
            var $datepickerInputContainer = $(document.createElement('div'));
            var $datepickerInput = $(document.createElement('input'));
            var $datepickerButton = $(document.createElement('button'));
            var $datepicker = $(document.createElement('div'));

            $datepickerContainer.addClass('cd-datepicker-container');
            $datepickerLabel.addClass('cd-header-menu__label');
            $datepickerLabelText.addClass('cd-header-menu__text');
            $datepickerInputContainer.addClass('colors-selection');
            $datepickerInputContainer.addClass('cd-header-menu__input-container');
            $datepickerInput.addClass('cd-header-menu__input');
            $datepickerButton.addClass('cd-header-menu__calendar-btn');
            $datepicker.addClass('cd-datepicker');
            $datepicker.addClass('cd-hidden');

            $datepickerLabelText.text(caption);
            $datepickerInput.attr({
                type: 'text',
                readonly: 'true',
                autocomplete: 'off'
            });

            var selectedDateString = '';

            if (selectedDate) {
                selectedDateString = selectedDate;
            } else {
                var currentDate = new Date();
                var currentDay = String(currentDate.getDate());
                var currentMonth = String(currentDate.getMonth() + 1);
                var currentYear = currentDate.getFullYear();

                if (currentDay.length === 1) {
                    currentDay = '0' + currentDay;
                }

                if (currentMonth.length === 1) {
                    currentMonth = '0' + currentMonth;
                }

                selectedDateString = currentDay + '.' + currentMonth + '.' + currentYear;
            }

            $datepickerInput.val(selectedDateString);

            $.datepicker.regional['ru'] = {
                closeText: 'Закрыть',
                prevText: 'Пред',
                nextText: 'След',
                currentText: 'Сегодня',
                monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                    'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
                    'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
                dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
                dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
                dayNamesMin: ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'],
                weekHeader: 'Нед',
                dateFormat: 'dd.mm.yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['ru']);

            $datepicker.datepicker($.extend({},
                $.datepicker.regional["ru"], {
                    defaultDate: selectedDateString,
                    onSelect: function (date) {
                        $datepickerInput.val(date);

                        buttonFireEventAsync('tabSelectionChanged', type + '_' + id + '_' + date);
                    }
                }));

            $datepickerInputContainer.click(function () {
                $datepicker.toggleClass('cd-hidden');
            });

            $datepickerInputContainer.append([$datepickerInput, $datepickerButton]);
            $datepickerLabel.append([$datepickerLabelText, $datepickerInputContainer]);
            $datepickerContainer.append([$datepickerLabel, $datepicker]);

            $(parent).append($datepickerContainer);
        }

        function _appendTabPanel(sections, sectionIndex, parent) {
            var section = sections[sectionIndex];
            var panel = document.createElement("table");
            var panelBody = document.createElement("tbody");
            var panelRow = document.createElement("tr");

            _appendTabCaption(section, panelRow);

            for (var j = 0; j < section.items.length; j++) {
                var panelItem = document.createElement("td");
                panelItem.className = "big-data-block__data-set-switcher__button";

                if (section.items[j].selected) {
                    panelItem.className = panelItem.className + " big-data-block__data-set-switcher__button_selected";
                }

                panelItem.innerHTML = section.items[j].name;
                panelItem.setAttribute("buttonId", section.items[j].buttonId);
                _attachSwitcherAction(panelItem, sections, sectionIndex);
                panelRow.appendChild(panelItem);

                if (j < section.items.length - 1) {
                    var gap = document.createElement("td");
                    gap.className = 'big-data-block__data-set-switcher__gap';

                    panelRow.appendChild(gap);
                }
            }
            panelBody.appendChild(panelRow);
            panel.appendChild(panelBody);
            parent.appendChild(panel);
        }

        function _appendComboBox(sections, sectionIndex, parent) {
            var section = sections[sectionIndex];
            var comboBoxPanel = document.createElement("table");
            var comboBoxPanelBody = document.createElement("tbody");
            var comboBoxPanelRow = document.createElement("tr");

            _appendTabCaption(section, comboBoxPanelRow);

            var comboBoxTd = document.createElement("td");
            var select = document.createElement("select");
            select.className = "colors-selection big-data-block__selector";

            for (var j = 0; j < section.items.length; j++) {
                var option = document.createElement("option");
                option.value = section.items[j].buttonId;
                option.id = section.items[j].buttonId;
                option.innerText = section.items[j].name;

                select.appendChild(option);

                if (section.items[j].selected) {
                    select.selectedIndex = j;
                }
            }

            select.onchange = function () {
                buttonFireEventAsync("tabSelectionChanged", _customTabPanelGenerateIdString(sections));
            };

            comboBoxTd.appendChild(select);
            comboBoxPanelRow.appendChild(comboBoxTd);
            comboBoxPanelBody.appendChild(comboBoxPanelRow);
            comboBoxPanel.appendChild(comboBoxPanelBody);
            parent.appendChild(comboBoxPanel);
        }

        function _appendCustomComboBox(sections, sectionIndex, parent) {
            var section = sections[sectionIndex];
            var comboBoxPanel = document.createElement("table");
            var comboBoxPanelBody = document.createElement("tbody");
            var comboBoxPanelRow = document.createElement("tr");

            _appendTabCaption(section, comboBoxPanelRow);

            var comboBoxTd = document.createElement("td");
            var inputWidth = section.items[0].text.length;
            var fontMultiplier = 7.8;
            var checkBoxWidth = 35;

            for (var i = 0; i < section.items.length; ++i) {
                if (inputWidth < section.items[i].text.length) {
                    inputWidth = section.items[i].text.length;
                }

                if (section.items[i].text.length > 40) {
                    inputWidth = 40;
                    section.items[i].tooltip = section.items[i].text;
                    section.items[i].text = section.items[i].text.slice(0, 37) + '...';
                }
            }

            inputWidth = inputWidth * fontMultiplier + checkBoxWidth;
            parent.style.width = inputWidth + 54 + (section.caption ? section.caption.length * fontMultiplier : 0) + 'px';

            createCustomSelect(
                comboBoxTd,
                {
                    id: section.id,
                    multiSelect: false,
                    cssPrefix: 'tab',
                    inputHeight: 32,
                    indicatorForSelectedItems: true,
                    itemPaddingLeft: 10,
                    inputWidth: inputWidth,
                    listWidth: inputWidth + 34,
                    onItemClick: function () {
                        buttonFireEventAsync("tabSelectionChanged", _customTabPanelGenerateIdString(sections));
                    }
                },
                transformCustomSelectData(section.items)
            );

            comboBoxPanelRow.appendChild(comboBoxTd);
            comboBoxPanelBody.appendChild(comboBoxPanelRow);
            comboBoxPanel.appendChild(comboBoxPanelBody);
            parent.appendChild(comboBoxPanel);
        }

        function _appendTabCaption(section, parent) {
            if (section.caption) {
                var td = document.createElement("td");
                td.className = "big-data-block__data-set-switcher__tab_caption";
                td.innerHTML = section.caption;
                parent.appendChild(td);

                var tdGap = document.createElement("td");
                tdGap.className = "big-data-block__data-set-switcher__gap";
                parent.appendChild(tdGap);
            }
        }

        function _attachSwitcherAction(td, sections, sectionIndex) {
            $(td).off().on("click", function (event) {
                var section = sections[sectionIndex];
                var newItemButtonId = event.target.getAttribute('buttonId');

                for (var i = 0; i < section.items.length; ++i) {
                    if (section.items[i].buttonId === newItemButtonId) {
                        section.items[i].selected = true;
                    } else {
                        section.items[i].selected = false;
                    }
                }

                if (!$(td).hasClass("big-data-block__data-set-switcher__button_selected")) {
                    var $tabItem = _getParentByType(td, "tabPanel");
                    $tabItem.find(".big-data-block__data-set-switcher__button_selected").removeClass("big-data-block__data-set-switcher__button_selected");
                    $(td).addClass("big-data-block__data-set-switcher__button_selected");
                    buttonFireEventAsync("tabSelectionChanged", _customTabPanelGenerateIdString(sections));
                }
            });
        }

        function _getParentByType(el, type) {
            var parentType = $(el).attr("type");
            while (parentType !== type) {
                el = $(el).parent();
                parentType = el.attr("type");
            }
            return $(el);
        }

        function _customTabPanelGenerateIdString(sections) {
            var result = '';

            for (var i = 0; i < sections.length; ++i) {
                if (sections[i].items) {
                    for (var j = 0; j < sections[i].items.length; ++j) {
                        if (sections[i].items[j].selected) {
                            result += sections[i].items[j].buttonId + ';';
                        }
                    }
                }
            }

            return result.length > 0 ? result.substr(0, result.length - 1) : '';
        }

        function _getSelectedButtons(el) {
            var $parentPanel = _getParentByType(el, "parentPanel");
            var selectedTabs = $parentPanel.find(".big-data-block__data-set-switcher__button_selected");
            var ids = "";
            for (var i = 0; i < selectedTabs.length; i++) {
                ids += $(selectedTabs[i]).attr("buttonid") + ";";
            }
            var comboBoxes = $parentPanel.find(".big-data-block__selector");
            for (var i = 0; i < comboBoxes.length; i++) {
                ids += comboBoxes[i][comboBoxes[i].selectedIndex].value + ";";
            }
            return ids.substr(0, ids.length - 1);
        }

        function drawLinksList(parent, options) {
            var $parent = $(parent);
            var $list = $(document.createElement('ul'));

            $list.addClass('links-list');

            $parent.append($list);

            for (var hrefIndex = 0; hrefIndex < options.hrefs.length; ++hrefIndex) {
                var href = options.hrefs[hrefIndex];
                var $listItem = $(document.createElement('li'));

                $listItem.addClass('links-list__link');
                $listItem.text(href.title);

                $listItem.click((function (id, title) {
                    return function () {
                        options.handleClick(id, title);
                    }
                })(href.id, href.title));

                $list.append($listItem);
            }
        }

        function renderSidebar(parent, sidebarContent) {
            var $chartTable = $(document.createElement("table"));
            var $chartTableTr = $(document.createElement("tr"));
            var $chartTableSidebarTd = $(document.createElement("td"));
            var $chartTableChartTd = $(document.createElement("td"));

            $chartTableSidebarTd.addClass('chart-sidebar');
            $chartTableChartTd.addClass('chart-container');
            $chartTable.addClass('chart-sidebar-table');

            var chartContainer = document.createElement("div");
            chartContainer.className = "highcharts-container";

            if (height < 100) { // костыль для IE5
                height = 650;
            }

            //$(chartContainer).css("height", height + 'px');

            $chartTableSidebarTd.append(sidebarContent);
            $chartTableChartTd.append(chartContainer);
            $chartTableTr.append([$chartTableSidebarTd, $chartTableChartTd]);
            $chartTable.append($chartTableTr);

            parent.appendChild($chartTable[0]);

            return chartContainer;
        }

        // Для нужд костылей, коих тут половина кода!
        // IE5 довольно жесток Т_Т
        var _infoBlock1Chart = null;

        function init(minBigBlockHeights) {
            return;
            var $mainContent = $(".main-content");
            var $infoBlock1 = $("#infoBlock1");
            var $inlineSmallBlocks = $('.small-data-block_inline');
            var $inlineSmallBlockIconParts = $('.small-data-block__icon-part_inline');
            var $inlineSmallBlockIconImgs = $('.small-data-block__icon-img_inline');
            var $inlineSmallBlockTextParts = $('.small-data-block__text-part_inline');
            var $bigBlocks = $('.big-data-block__container');

            var defaultInfoBlockSelectWidth = 0;
            var prevChartHeight = 0;

            // Динамическое высчитывание и применение высоты для больших блоков
            var calcBigBlockHeights = function () {
                var $highchartsContainers = $('.highcharts-container');
                var $linksLists = $('.links-list');
                var linksList1Height = $($linksLists[0]).outerHeight();
                var linksList2Height = $($linksLists[1]).outerHeight();
                var maxLinksListHeight = 0;
                var bigBlocksHeight = 0;

                if (linksList1Height > linksList2Height) {
                    maxLinksListHeight = linksList1Height;
                } else {
                    maxLinksListHeight = linksList2Height;
                }

                if (maxLinksListHeight > minBigBlockHeights) {
                    bigBlocksHeight = maxLinksListHeight + 24;
                } else {
                    bigBlocksHeight = minBigBlockHeights;
                }

                $bigBlocks.css('height', bigBlocksHeight + 'px');

                $highchartsContainers.each(function (index, elem) {
                    var $elem = $(elem);

                    $elem.css('height', ($elem.outerHeight() + bigBlocksHeight - prevChartHeight) + 'px');
                });

                prevChartHeight = bigBlocksHeight;

                if (_infoBlock1Chart) {
                    _infoBlock1Chart.reflow();
                }
            };

            // Схлопывание маленьких блоков при маленькой ширине
            var calcSmallBlockStyles = function (infoBlock1Width) {
                var INFO_BLOCK_1_MIN_WIDTH = 747;

                if (infoBlock1Width < INFO_BLOCK_1_MIN_WIDTH) {
                    $inlineSmallBlocks.removeClass('small-data-block_inline');
                    $inlineSmallBlockIconParts.removeClass('small-data-block__icon-part_inline');
                    $inlineSmallBlockIconImgs.removeClass('small-data-block__icon-img_inline');
                    $inlineSmallBlockTextParts.removeClass('small-data-block__text-part_inline');
                } else {
                    $inlineSmallBlocks.addClass('small-data-block_inline');
                    $inlineSmallBlockIconParts.addClass('small-data-block__icon-part_inline');
                    $inlineSmallBlockIconImgs.addClass('small-data-block__icon-img_inline');
                    $inlineSmallBlockTextParts.addClass('small-data-block__text-part_inline');
                }

            }

            // Схлопывание секции табов при маленькой ширине
            var calcInfoBlock1TabSection = function (infoBlock1Width) {
                var INFO_BLOCK_1_MIN_WIDTH = 647;
                var TAB_SECTION_DATE_MIN_WIDTH = 163;
                var TAB_SECTION_DATE_INPUT_MIN_WIDTH = 75;

                if (infoBlock1Width < INFO_BLOCK_1_MIN_WIDTH) {
                    $infoBlock1.find('.tab-custom-select__input').css('width', infoBlock1Width * 0.12);
                    $infoBlock1.find('.cd-header-menu__label').css('width', TAB_SECTION_DATE_MIN_WIDTH + 'px');
                    $infoBlock1.find('.cd-header-menu__input').css('width', TAB_SECTION_DATE_INPUT_MIN_WIDTH + 'px');
                } else {
                    $infoBlock1.find('.tab-custom-select__input').css('width', defaultInfoBlockSelectWidth);
                    $infoBlock1.find('.cd-header-menu__label').css('width', '');
                    $infoBlock1.find('.cd-header-menu__input').css('width', '');
                }
            }

            // Воспроизведение всех костылей для "адаптивности" вёрстки
            var calcSizes = function () {
                var MARGIN_AND_BORDERS_OF_BIG_BLOCKS = 11;
                var infoBlock1Width = $mainContent.width() / 2 - MARGIN_AND_BORDERS_OF_BIG_BLOCKS;

                calcSmallBlockStyles(infoBlock1Width);

                // Фикс ширины первого большого блока из-за ограничений IE5
                // Иначе можно было бы просто использовать flexbox, grid или просто calc
                $infoBlock1.css(
                    "width",
                    infoBlock1Width
                );

                calcBigBlockHeights();
                calcInfoBlock1TabSection(infoBlock1Width);
            };

            // Первый вызов костылей "адаптивности" вёрстки при инициализации.
            // setTimeout нужен для правильного момента получения данных из самой вёрстки для рассчёта!
            setTimeout(function () {
                defaultInfoBlockSelectWidth = $infoBlock1.find('.tab-custom-select__input').outerWidth();
                prevChartHeight = minBigBlockHeights;

                calcSizes();
            }, 0);

            // Перерасчёт "адаптивности" при изменении разрешения
            $(window).resize(function () {
                calcSizes();

                // Второй перерасчёт нужен для фикса "сдвигов" маленьких блоков при изменении масштаба в хроме
                // встречается иногда
                setTimeout(function () {
                    calcSizes();
                });
            });
        }

        function getInfoBlock(data) {
            data = parseDataFromString(data);

            var handleClick = function (id, title) {
                if(id[0] >= 0 && id[0] <= 9) {
                    window.open("/dashboard/report/"+id, "_blank");
                }
                if(title == 'Данные по вакцинации субъектов') {
                    window.open("/dashboard/table/30028", "_blank");
                }
                if(title == 'Причины не выполнения') {
                    window.open("/dashboard/table/30010?rel_id=30009", "_blank");
                }
                if(title == 'Хозяйствующий субъекты вакцинации') {
                    window.open("/dashboard/table/30008?rel_id=30007", "_blank");
                }
                if (id) {
                    buttonFireEvent('linkId', id);
                } else {
                    buttonFireEvent('linkTitle', title);
                }
            };

            var options1 = {
                id: 2,
                type: "linksList",
                handleClick: handleClick,
                hrefs: data.block0.hrefs
            };

            var options2 = {
                id: 3,
                type: "linksList",
                handleClick: handleClick,
                hrefs: data.block1.hrefs
            };

            renderChart(options1);
            renderChart(options2);
        }

        function createSidebarContent(selectedCategory) {
            var items = [
                {
                    title: 'Все',
                    cssMods: ['chart-sidebar-content__icon_with-margin-left'],
                    img: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAUCAYAAABroNZJAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKMSURBVHgBpZNLT1NRFIW/e29flNIHBaStsQUb0RC0ECEmiNaBUWTgQJ040KHM/AHGgYmJMVEH/gBkooYYGBDnYBDEYCQBIqI8WqUFLW2xpfTdemFALCk1ykpOTnLO3uusvfc6wnR7W559Qix1mZXp14WSIcVJlrIZErk8qXyeUZ2efuexfyexiBIfLAYWUaBUajjZ4sKj1jJjNOO32IqSKHYfaASB7+U1vNAFWfMHOTj4ms7LV+i6cB6fz0fi4X00sVhpJcuSmo9BEa0mQ5O9ApvVitmgJ5vN4hsbJdTcyl/LGTI6WNUY+SEeIRX7xuLCAuFwiAq9njqZ0Pp2uDTJVjMdqTC3oh4ssVXSkh3XUeX23aZcgr61jc8Ie5PMpdL8On0Gx43rRMtFTIKcZDCirnAipP1EolHevxtnQFDyUm50OJsrrmQoEkP59DHn7tzlUW8vFzsvgaRnYyNBmSqHqdKEo6UFt1ZD5JB9J29nOrnKSmIrfuKyR07Y7Tzr6SEQCJBKJhmZ+sLcm5scjqjp1CiZTaYpFwXsalUhST4YpD4fYt1mo7+vj4mBfkRJQUcixlmFRLVCx7izFl0gjEulZjKd3Xp6O1f48++82kwiVlfjjkUZlD1/3GhgOCOX0diEb/4rzT9XSNQ7ubrsYc/pdNTWYMhkeKIzMhXZ4Hkqx9iSF6/XS6PTiTadYXV6mt0oULIlcN5kZsK/glmS6A2EqFPKFatUhGUn5zbjPKgxUSUV2qvA9pK8GsJBGspUfJJHfu1AFWWJOF06LSPxJGtSGRnypZX8L0RBUqyzD0g6HYp0KtesEvPuYgE5Qbgtby5RrfGQiN8rFiNYrB5KYba72zHT3jo06T7lKBX3G21+70g+XJEkAAAAAElFTkSuQmCC'
                },
                {
                    title: 'ЦАО',
                    img: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAATBSURBVHgBrZZZbFRVGMd/d5t96XRxujFDFxZbgYIaFMT4IiohkSghxBCFB32WRJ/0gbi8iiFGiWJwAcODRk1MCCRCAAUDtmKRQqGW1nba6WydTmemM3dm7vXMNCHRMNBGv/ty7/lu7vc7/285V6KKmcLutJ6bm2U2+j5zg6fIZSZA13AuDWINbqOm7kVU1XrH70nC7rjOAgHKj+nUSeLhN5Hl5Tjsz2MqbjDEa3qCZPYQVoudWv9buDxr/3+A9EySa1+/Ixzga+hBle042tvITccxEil0I81MpJeS3cf6Xfv4d7xqACoLNLOYxzzzLYoMydJ3gsOkZEjiWRAZIGsSUpnZXgsCYKG2YICyJbMKN8IiQFm4kondUiBXUIVakkgHFZCe+0voeo7ZVJj6hrZ7fvOuAGOjFwiNfUFb+2Zslo3M1TZw/XLtbX+pVqLO6yN5K3F77eFnAqJGIDR+gv7fhnj0sTewO3yLB8jnc5w99QrLOuOM3czSUHcBz5Yn4VQvsqJjXdVEst7HrOKlucXP+PUhiOm4tj7C4JUjaNJHZGbDxGIvCDXOVwWQqzn+HLqE1d5Jf79BMn2BkdAxIenW+Z2XNE6P5KgLBNmxrYeIO4N7TatIjLikWYrGGF53lGzGJlT8nsmxwywaoL/vA1wuN/5GlXQ6RSyhoChKxVcO1NZQT6BGI1XQUEoS8R8HK77M7CRe12FicYmO5XuFOhvZ8MTn1cJUT8Gz2w8xNXmO2ZkuIpMH6Oj0kgpH5hUQNbhuQzvxaBSXw44xncOGpdyhWGwBpqc9NPkzyPanSMS+ZPyvKItW4Ozp17FYPfh8Co1NQUz1QzL5zyq+glri6sBF+novcfKH4wS6l2EoZnl4kEiIYPIaNK2Int1HobSCpuanWTRAMPic2P0ECkdJpVxkU0cozO2s+Gy6wsDlfmyShWDKQ/TXYVSrVp42NDZvwl9/g3BsveDRWN3zEi53HYsGWNm9WUjqYC4bpViyY9FGcbrmW7A805rUGjLXxsgkwsi6iZEtVnx+/zKK0su4vTvEe27uZVVrIJ1Okp05SCK/G9tcM9GhY1hrjqJ5JQKr43QFcjywcQrVEiI0epPclErkcpA/vtlLnbwBuvzktQD+1rRIpWvxADabC1NqojnwOB7vKq4cPE6ud4BXv3oPQ50RishiFIcxDDftKzxCJdGu3TFiB/aT2eWge+0e0YLDhMN9LAlsqgpQ9TCamrxlxhNZrDYrqqISCoVEXSwlr+eJRiI0NNxXaU+73SlS4yQej4mCrRUgJWKRKXFfJ2pnBofTSmtrE05n7SIPo8k4E8c+xeyUxVBpITp4g/u2v4bN6xVHsQPNoongDlRNpVgoVCANwyA7Mkzk/MeYHQ8RDf2O9ZpBy7v7q4apCuBb2YUjlaX4yU8kGk3qlptk9e041Qep8fmQJVnsfD63uq5X1gyjRFo/h338F6ZPXMSeEWfFzj046+urhbn7/4CeThP9+QxzuQgTJ98Wve7G5u9AEcNGVj0UCuI4dshINh1zaIacaxhpbAQzKxPcvR9FKNOyect8oP/6QzIzOkpmfIDkYB+56FXmxsbJpCOohobNU49WClKzaR2uJV14u3tw1P5z19UA/gZSXvUsU8OntgAAAABJRU5ErkJggg=='
                },
                {
                    title: 'САО',
                    img: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAASoSURBVHgBnZZLbFRlFMd/986jdzqvTmeGTjszhRYIYtraYJGCPBag0QgJhpi48pHgxsiChUsSXbI1GpWNiYkJBjWKAU0hkAAxtkBN5NFCi6SdttOZ6TzaGeZxp/dev7nVhQ0d236zmJvvcc7/O+f/P+eTWGEYhjEg/jYtn3/yJMfE0Cmyk/fIxLJodpkmX4DQM31s7v8Im832NHM/SZL04dMWJFYG8Hg5gMTMXUaH3qeSVHA3d2F3u5Akg4XZHKo+jMMfpGfvJ3h97cvNfS0AvP00P1ZWOTRNIxEbILTxNVr2HaXJv+0/6+mZ30lMX2J2ckAAOL5as6sHkL7yDa6RuyI0EmnjNGkRPEd7O3q1QmU6ATIoFgNJf0zetg33s/tWZbcugHx+gcnJGNFoFL0yzcjMNPmy3Qy7JEs4Z6ZY1KxUZDGHhm4Y+K0lmgrzJBIJMpkMnZ2dNDQ0rA/A0OAgLaFWcrkcdmH89NwehitRrLLGom7BLVeEWytF8S2ji5/MG8of9Amr6XQaVVW5c+cOfX19K/qQ6wGoVqu4XC4KhQJqcAcWZ0jc1OD11qumw/f2Rnlpmxe7pHIscsU8o7R2UXKE0BYXlxhu6PVc1Aewq383mq6Z0ir7OtEcHuFeoqoW+KD9M0Yffo+U/YGTHZ8SzzvNMwWliQXZLaTZZKaku+e5ei7qp8BqteJ2upiYmEBxOLBaLOb8z6kj7HDdpr/1oVCHwfmZVxktbzfXGhsb0XWdVDJFOBKpyZl1AYjH4xSLRTOXzc3NIpI6rU0K0fmKWLUxy4v8mNyztLlBIvIPzwJuOx6P2zy7sDBvEjEQCLBmAMO3btEc8Js3qLE4Im6zPRTDpSxlTdINZPGpLatlW0Ju2trClEplMgJ8IjFLMjnLmgH09vaKgyki7VHhSBbSk7j2KM9vjzKmy6hLo9c7x820X0izSAGPec6pOMy9iqLQuWWzSeKWUIg1AwgL7auCyXOplCCibirBMCkIbQ6NLleR7rCPqp5jo5DqmdtFdNkm8m8wPj5uqqAWgbZwG36/f+0AauP+/XuMjz2kxqNIOCIkY8dmLLJFybG9o4UjB3ai37hPLj3JBjVB0t5pdpcb16+Z3BGB4NChlwUHgusDEBI3jzUoNDqdOIaGWMhGUCUPsUUfvbNnOPfdV2QLGhvc86jOt9A1G5mbQ3hbishbt6IW8vgkqZ6L+gAyA5ewdGxCqgFQK7wy9gt9b57EarNT5mNGptIEW2zYvR6Otcqo8xm6Lp7F6utFKpdQYzHiN64T7elZHwA9GMR7+TKlo0fpPnWK4udfcPCd/TiE1mujWKpgt1lFvViqD1NjY8TD79L8wk5uXbhAaPQB1l39rDsC+0+cYDCTJnXxIlfPn0cXhckQ5KpJs8b0RseS+GulxhDt2imAjZz5Evu3Z7GI9HUcOED34cP1XPz/gyT51yOGjx8nIwwmPFl00XIdojpaXG42COk9sVRxlqskVLGmFmnM2mhUnTjFnoPnzqEsRWvFB8mqXkSFuCgkDXYeXP2V7J+DJOdE/89nmSql8Eo2go4gZa+LYKCD9ud3E921B0n0D4fX+6+5FQH8DaiH4KJ8MgRrAAAAAElFTkSuQmCC'
                },
                {
                    title: 'СВАО',
                    img: 'data:image/png;base64,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'
                },
                {
                    title: 'ВАО',
                    img: 'data:image/png;base64,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'
                },
                {
                    title: 'ЮВАО',
                    img: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAUCAYAAADskT9PAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAVlSURBVHgBrVZ7bBRFGP9mdvdu9959XQseLaWltOVRQRAa1Ao1liBFElP8A6LFYKygEqLGoP8UgwmJER8gWoihaP8wipEqhPgACvVJbJDKoxTaUsrRu+Pa3m1v7/Y1M24xJiYW6Bl/ye7szsz3+3755ptvBsF/wI9vuvxamD2p6/wKQ+MmSW4jiARyFPuTLUs2w5V0uBCkif2vSPmVZeqJWMiOe3rZBtVBg27Tljt1mrHX6TH5/hv0gWVb4PJE+TCkgb76u6cuxN6dsfO5EbfuFCrM4qz7Q/lDFalCv5Rwg3whrysQy9vVs6Js+kQ5eUgDiKDqkXO+R6hBYETiABlkn8/rVuNDqsiG/YiZbEoKYSaKeJk1/dLfdu07hE1Sl7F7/h4w0hLQ2Ag4csrp909VEo27IcEJHHCLr0GgQOVMa9xpvc9fd0rlk5NIIxgMhiFySWJwrhAYA/TMfOD3dIDhEowz5kyYYZmcTUcAKlLtO6fNgYb5xdxpfW1GreYbSPTGmNpiFjk1wkFNdgS+HfWjxaEodI26YdCwQx3u0cXcaPjwNu79R1chdV4V2i8Ixo74KGwcz8ntBLBADvVmulTMcax3bVV0ls0OUn5MuEh4eZ4BHJR7ZAhSN5S5FfDbTbisu8CPTRWygjY/waJLpE/l+qA+qSOuLyIEAPR/ObltEhqa8ZlsRTfTRetGNeHwpet8N6XAKnwyVPhikGXXYZZnFAocCsy2+uZZT1xBPTyPtog2ttqi0O02wAPD+NMpWaR6whF47QnprvtKzS19N1BTaYAcMAla45aokuMhG05e9QZSzA2EIsizi9Cd8kJYRDBi2CBBBZBkrKdSiXVl+UbH8CgkrY0eMg12Oq7T1gkLKMol2zGGWn8GTCrLJ9WaAacpI6u7eiHypaf4equZD6IVCt6kkMA8iCoFzQqmlXew0Xm2tCpz+L14Au/Ly2RrELD2P7ptR0HWRsbzNe4SOCUI2gT6/YIifVpc4bwIUDnPgCxvBP34gGtobI4IJjxoRqGWhKAKRaHEkK1eBs3hyVciEaj3uikiFIi1BOuzs8xZ65pBnbCApK5/KArUZ5jwjs9J9JTOWjgellz4COYmbOJNASv5QVDtGI5hPyiUh4ccN27aqphXJvlhlfVZGRpGWwmDZEITZLgFxhXQL8LVn89YSYTgiq7Bu9PrYX1xPzSf7LQvWmyPOsbmtNNsOE5zQEEYwqYAB/QAIMbYw3gwB3NgG03i1oWb6I6hEVhTnKc13EoAN15nWxuwTXUuF8/pZZoJXH0NhGkA9s0uIKtr3JFOpmiDxyK+3ShhtFk+A3GFvZWSzW8+zvq14vHMgXYM6Dmng7ZlVkB7od3G221kzgeH4OvxfN3yMPriVSsBC9HBWJIryXBRZ298Bj7RO7eVEMNKB5usUoc8FsCUqmRIkjRiLT84uFieotnUyV65oLb0h0q3PRYMRrnsi9e4I0+/rT2WloAxdO6BKpHntg+pOfce6V6EZBpAVkICsraIrmlW+5c5tv6t0mu1N0eBUY0VePrYsqITVh0wDp0Ns2dXvgTRtAWMYXMdSA3L0e8c5guPDtTisFmORcmJhoeGweN2U80wLgsCX6IoCfD5MkCLh9k9uT/RmVkdXH8INVW9TBpux3/H47jSqmaYoV9UnfAzk9+l5pCvmMBkZpqGVYxoU+PW10sZhU+oVRNcpJcuSB2EEl+HrqSQmptNTt2Jf6IXEvTbLmFuJITjXl5o0jTX0iDJY9iDPy/N7mw+PzD7BS2q10zhw+D0J99QXMm9Y0Y1L8LA/yXgn8AHn3cudUmonulcZULmJ7lcpMfm0A+YPGmp3qb1pEP2J7Qfa/mo6FDSAAAAAElFTkSuQmCC'
                },
                {
                    title: 'ЮАО',
                    img: 'data:image/png;base64,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'
                },
                {
                    title: 'ЮЗАО',
                    img: 'data:image/png;base64,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'
                },
                {
                    title: 'ЗАО',
                    img: 'data:image/png;base64,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'
                },
                {
                    title: 'СЗАО',
                    img: 'data:image/png;base64,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'
                },
                {
                    title: 'ЗелАО',
                    img: 'data:image/png;base64,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'
                },
                {
                    title: 'ТиНАО',
                    cssMods: ['chart-sidebar-content__icon_with-margin-left'],
                    img: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAAUCAYAAABroNZJAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAKMSURBVHgBpZNLT1NRFIW/e29flNIHBaStsQUb0RC0ECEmiNaBUWTgQJ040KHM/AHGgYmJMVEH/gBkooYYGBDnYBDEYCQBIqI8WqUFLW2xpfTdemFALCk1ykpOTnLO3uusvfc6wnR7W559Qix1mZXp14WSIcVJlrIZErk8qXyeUZ2efuexfyexiBIfLAYWUaBUajjZ4sKj1jJjNOO32IqSKHYfaASB7+U1vNAFWfMHOTj4ms7LV+i6cB6fz0fi4X00sVhpJcuSmo9BEa0mQ5O9ApvVitmgJ5vN4hsbJdTcyl/LGTI6WNUY+SEeIRX7xuLCAuFwiAq9njqZ0Pp2uDTJVjMdqTC3oh4ssVXSkh3XUeX23aZcgr61jc8Ie5PMpdL8On0Gx43rRMtFTIKcZDCirnAipP1EolHevxtnQFDyUm50OJsrrmQoEkP59DHn7tzlUW8vFzsvgaRnYyNBmSqHqdKEo6UFt1ZD5JB9J29nOrnKSmIrfuKyR07Y7Tzr6SEQCJBKJhmZ+sLcm5scjqjp1CiZTaYpFwXsalUhST4YpD4fYt1mo7+vj4mBfkRJQUcixlmFRLVCx7izFl0gjEulZjKd3Xp6O1f48++82kwiVlfjjkUZlD1/3GhgOCOX0diEb/4rzT9XSNQ7ubrsYc/pdNTWYMhkeKIzMhXZ4Hkqx9iSF6/XS6PTiTadYXV6mt0oULIlcN5kZsK/glmS6A2EqFPKFatUhGUn5zbjPKgxUSUV2qvA9pK8GsJBGspUfJJHfu1AFWWJOF06LSPxJGtSGRnypZX8L0RBUqyzD0g6HYp0KtesEvPuYgE5Qbgtby5RrfGQiN8rFiNYrB5KYba72zHT3jo06T7lKBX3G21+70g+XJEkAAAAAElFTkSuQmCC'
                }
            ]

            var $table = $(document.createElement('table'));

            $table.addClass('chart-sidebar-content');

            for (var itemIndex = 0; itemIndex < items.length; ++itemIndex) {
                var item = items[itemIndex];
                var $tr = $(document.createElement('tr'));
                var $imgTd = $(document.createElement('td'));
                var $img = $(document.createElement('img'));
                var $titleTd = $(document.createElement('td'));
                var $selectMarkerTd = $(document.createElement('td'));

                $tr.addClass('chart-sidebar-content__item');
                $imgTd.addClass('chart-sidebar-content__icon-container');
                $titleTd.addClass('chart-sidebar-content__title-container');
                $selectMarkerTd.addClass('chart-sidebar-content__marker');

                $img.attr('src', item.img);
                $img.addClass('chart-sidebar-content__icon');

                if (item.title === selectedCategory) {
                    $tr.addClass('colors-font');
                    $tr.addClass('colors-secondary-faded');
                    $selectMarkerTd.addClass('colors-secondary');
                }

                if (item.cssMods) {
                    for (var cssModIndex = 0; cssModIndex < item.cssMods.length; ++cssModIndex) {
                        $img.addClass(item.cssMods[cssModIndex]);
                    }
                }

                $tr.click((function (title) {
                    return function () {
                        var sto = $('.tab-custom-select__list-item.tab-custom-select__list-item_selected').data('id');
                        if(sto == 2)
                            sto = false;
                        else
                            sto = true;

                        startInitChart(title, sto, true);
                    };
                })(item.title));

                $imgTd.append($img);
                $titleTd.text(item.title);

                $tr.append([$imgTd, $titleTd, $selectMarkerTd]);
                $table.append($tr);
            }

            return $table[0];
        }

        function initChart(dataSet, tabs, sidebar) {
            dataSet = parseDataFromString(dataSet);
            tabs = parseDataFromString(tabs);
            sidebar = parseDataFromString(sidebar);

            var tabSection = [
                {
                    id: 1,
                    type: "datepicker",
                    caption: "Дата:",
                    selectedDate: tabs.selectedDate,
                    marginLeft: "6px",
                    rightTab: true
                },
                {
                    id: 2,
                    type: "customComboBox",
                    caption: "Вид объекта:",
                    marginLeft: "22px",
                    rightTab: true,
                    items: tabs.comboBoxItems
                },
                {
                    id: 3,
                    type: "tabPanel",
                    caption: "Всего:",
                    marginLeft: "22px",
                    rightTab: true,
                    items: tabs.totalItems
                }
            ];

            addLinearGradientToSeries(dataSet.series);


            var options = {
                id: 1,
                type: "columnChart",
                sidebarContent: createSidebarContent(sidebar.selectedCategory),
                tabSection: tabSection,
                dataSets: [dataSet],
                disabledTooltip: true
            };

            _infoBlock1Chart = renderChart(options);
        }

    </script>
</head>
<body>
<div class="main-content">
    <div class="main-content__selection">
        <div class="section__content section__content_without-header cd-section-content">
            <div class="section__content__container">
                <table class="section__small-blocks-table">
                    <tbody>
                    <tr>
                        <td class="small-data-block small-data-block_inline" id="wholesalers_block">
                            <div class="small-data-block__icon-part small-data-block__icon-part_inline">

                                <img
                                        class="small-data-block__icon-img small-data-block__icon-img_inline"
                                        style="width: 21px; height: 21px; margin-top: 3px;"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAPqSURBVHgBvVa9jxtFFH9vPiyflehWSKCjslMhoRQXihRUm+6ITor5C3x0dDgNlHepkEKRuxpFd1fSgE9C0JGkwYCQzgUSHb4IBIdEsQkXZ23vzst7s7vetc+RTiky9ux8/37vvXkzbwBeQ8ILz9zshxr1tjK6pWsKUCEYy6U2oLhUhuuctZISI43q6O8vmjsXJ9notxBhiMaQgGmrUGlFymrQhuuG61ohcp82KKUnBYLb/9xt7ppzgOFxoC5PtmsrtbZtWLArFsZn42D034gH6ZAxdiAhIGMhTQBSy93WQR1qPFyHdMrN2jjUgAeA1OHRJSSNySf87ZJA5tmllOlMbhB//d7jZcrGlfraZ8NHLAawToG01eJkJAoFOZlCO9GqxTZpxU/jntCxXSJ4hWSW9qL8KYrvv/vYS7jRj2SjIYVXSiUJe49R5laSpC3RhJ1mZ2XrtxPdqMHo37NwMhozc87CjqCt3r681tiLvrw68H03+/vB228cRfff6fk2sU0ya+ckG/0tJNwn5K8SU/rRUGYpyQazTtAZiYKQvx1dq0vrI14fso91wFCT2xkJQ6FSFU0QO56caE8ZM0gd4zAo+yk4ppuOky0eDgsOPzcjm+uQJVUzMSBWzEV8DhQ4o3ch954YKh5z8yfvDJDm5nKOD5yeBxQCgqVJlaQvmeFBaTmCW2hXaWkZCRtx1ssba9u/duDcmmJPFOT2oco4nSPMxz2J+AFLipUJ+7quD97sDtcz0GLjS3P5VeieZOM6wmVXVHVPSHaMXU58JS7EENEQVjNQ8kQzTeqNHrmkOZomh7793fWB2/ylO4mTR/McFRf2dIowXjDOLKlCyFyT3rWIdblTvUrg2+t7z+YYkArdTAGJDhdsiuVJZUSSA1O9INrHgTGwfukS1/lTN+bkdPfKSWV59oPKxsshnNUrqhaazR0Bufon42MF9EOKtQdsxAdg1B9vfTpsz1YIAC0cp6oL89geAxyd3rsyZ+NSSxKHaPFM3nh6yDYYiAwc1EqPxPJwqqUg37/fe/7VtQ9nbd6TTIa0sEXg5XLwzf/7V2+ANbezTaDVqiSz5XCRRBDJGsrjQ+bC3qtzGyY5N2JlzSwVd5ePE9olN2z7+CGIL3Ou1/0FCE//Oosch0GGWK+3+62Js6scyWQjg+Dj31sqYXJBchSsdYctdpQwPwUnHt6jfPBjVyl9L3sQcNy2mjjzA4HDNbdFqOjPSOK5j91Z1pDFey75GlM67+O6xHhZ5xRtnX7ePCzV2/x52xh1S1kTyGPAWANoS9BkNIXnT2IvHpOD1louSXlUMCj6F4vhPpC6f7Gog9O7zTvwutILa/9iQCfnAOUAAAAASUVORK5CYII="
                                        alt="">

                            </div>
                            <div class="small-data-block__text-part small-data-block__text-part_inline">Предприятия оптовой торговли</div>
                            <div class="small-data-block__array">

                                <img
                                        src="data:image/png;base64,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d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczpHSU1QPSJodHRwOi8vd3d3LmdpbXAub3JnL3htcC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgeG1wTU06RG9jdW1lbnRJRD0iZ2ltcDpkb2NpZDpnaW1wOjNlNzIzNWM1LWQ5MzItNGQxMi1iNTliLTljZTI2NzRjNmU4NCIKICAgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3M2VkM2U3Mi0zYjZlLTRkZTYtYTVmNC1jZTJkZTAzYjg1ZmMiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpjNDY3YzU1My1iNDM5LTQ0ZWEtYmIzOS1iNjc0N2RiYWRhZmMiCiAgIGRjOkZvcm1hdD0iaW1hZ2UvcG5nIgogICBHSU1QOkFQST0iMi4wIgogICBHSU1QOlBsYXRmb3JtPSJXaW5kb3dzIgogICBHSU1QOlRpbWVTdGFtcD0iMTY1NDY5NDUzMDMwNzk1NCIKICAgR0lNUDpWZXJzaW9uPSIyLjEwLjMwIgogICB0aWZmOk9yaWVudGF0aW9uPSIxIgogICB4bXA6Q3JlYXRvclRvb2w9IkdJTVAgMi4xMCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDpjaGFuZ2VkPSIvIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjRhYTc2ZTY2LTU3MjQtNDFiZC1iODQwLWIyYzU5ODhmNzUxNyIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iR2ltcCAyLjEwIChXaW5kb3dzKSIKICAgICAgc3RFdnQ6d2hlbj0iMjAyMi0wNi0wOFQxODoyMjoxMCIvPgogICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz6/eJONAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAB3RJTUUH5gYIDRYKsqhA6gAAANJJREFUaN7t2b0NgzAQBeAHyhqsYaZAYgqLkRBTIGWKUGQJJNYwhZUiVZq7Z53yrnKF3if8c5a7UkpB4OoRvAQQQAABBBBAAAH+GfCw+tDzdWI76jgnYBqHWIDtAN5XHS87AJwUhNsUWvb6V8IAcmqDMANM44B15iNMp1ALhPkaYCNcFjET4bYLsRCuJzEDoV7oV3tRT+XvWme7VqOPHN4NwArvAmCGNweww5sCWoQ3BXwuM8zwrrsQI7zpjSwnNLlSdnqhEUAAAQQQQAABBBCgWd2Bq15OnVwyJwAAAABJRU5ErkJggg=="
                                        alt="">

                            </div>

                        </td>
                        <td class="section__small-blocks-table__gap"></td>
                        <td class="small-data-block small-data-block_inline" id="wholesale-objects_block">
                            <div class="small-data-block__icon-part small-data-block__icon-part_inline">

                                <img
                                        class="small-data-block__icon-img small-data-block__icon-img_inline"
                                        style="width: 24px; height: 24px; margin-top: 2px;"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAQKSURBVHgB7VZLbxxFEK6q6Yk3gNhRDmAQkmd/AMIWQuK4cApCoETKnQ3ijgOy4Oa9Ig5O+AMJ4oiQfIObkwNEEInNKcfs5HGIEileO0qy8Xi6UtU9szuzfszaPiSH1D6mu7q6puqrRzfAK3rBhNMINc5ca2MYLpsZMx+EpokmuGJCc+nBL61f4YhEdQLmy3+7GdOaDNvM0GTdRNwG4ouz3/e7cETa34CTf3eshWUdMmPXbKQnMH16gsGeUx4GtPzeD3facAQy+65i8JULUsaLwz8+uDAcr5x/67t+U6zqZsRq4GU4JNWEQKAWzFMIdsR6y8IFDQcyzMMRqJKE9Pk/ixiYZYE2QkJOH28hhQEcjxpAASnkEn9iDBB1feaNGX1CtpUBKh/5ytOUTw/OtwYwJVUQYKYVeUQyUMvQ85yfIxGdYGE7F/t0JF/C9msN8y0cgMY5cPJqnOtMstWPWjnP6pse//b+ruX6ztIt1iDcX2nR7FK/I+OLoiGGA1AVgdJ/Qbhfp8ACIRlaGKAwZBrBIQ2IkZHZcgJTkkKPmIcKYOAigQczwFRGUuySTeNV59J+2+3XFonz/YnfAjEcyoCMI0mi6qq6hHu363s/ty5VOcg+IQ9jAIsBEgIEmxQaEBF2VXeqF5FNe1KacxQEUqIIm3c3MS/VVvObGyx81hIloyVLOkYylAxTXiiX6UQSWtlBpTlomvd3GLA9nM+hFnwsFnkwylj3FG/0xy5XHDryF4dhNURjBMjMSSMBm5WS8M+PW7wHbFZ7BcPa1u8ffgpT0Nvn+mviUTtA0yzzx+7KqaMGE9UekKJHOqX3ckPn+NnVPn3x381JudmlpP/uj7cdgmKvhpalicYw4YwnxEhDgJbr26i1kfRjTdB1b5CU8C7JIpGJRxNykcEMsopMKeDsvEI2tQYITHMqKnjd8i/aQ04/eVVon8iTId7dAKJIpTLenuog4VJ9SOkMXEikOgre7GI/dsZpYXkjvV5b1VNBwLkSUL0BzDG6tM4T1sJ1dfRYCCuNTi+OFnuRQN11RcC46g3OHFpSsnFZlSn7xIwHaiJjGp5FeL0nIHQCNh14EspF0rXRQXF7Es9AcbATEJRSXnNAJLJ0o+51mnT+XKbEMf76JMkoXJDRKrrX4EDOlMu8zQv3fmo5GdE98Gc8Vc6KEgLoFxrH12EK8om3PWasLiTPAE4/20OeXBIKyFJBE/yRRteK4SHWIiCKYreFoV62oMz1ATnrMC6zS2eBWEgcBW+m63jqWn4FQ/ck4/t9cSV7dH/Tlb00+N6xM//LOrn10bVN54T+miadR/mWtHPuzLFy4z+r3SqHw93JXE/3Ha/svlM4gUhOeUfg4mrDWNomG+XkYL4Or+hloufEG4ww2DUO6QAAAABJRU5ErkJggg=="
                                        alt="">

                            </div>
                            <div class="small-data-block__text-part small-data-block__text-part_inline">Объекты оптовой торговли</div>
                            <div class="small-data-block__array">

                                <img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAIGXpUWHRSYXcgcHJvZmlsZSB0eXBlIGV4aWYAAHja7ZdrcuQ4DoT/8xR7BL5AgMfhM2JvsMffj5LsaXdXT4+9HftjYqrskkpiUSQykUi49Z9/b/cvXilKdFnUSi3F88o119g4MX+/2vUZfL4+r1d6bvH9w3X3fiNyKf0x0soz/u16eJ/gPjTO5JuJbDw3+scbNT/z23cTPQ9KZ0WRk/lMVJ+JUrxvhGeCdm/Ll2r67Rb6uo/zbSd2/7vz0d+uyjP4u+9Zid4UnpNiXCkkz2dKzwLS+Y8uNU7K9WkMDMk458Z1JTwrISCv4vT+qqxon6Xml4M+oPJ+Fl5fd9+jleMzJH0X5PJ+fHndBXmNyhX6b56c7TmLH6/DwH6v6Lvon/+9p+1rz+yi5UKoy7Opt61cZ4xjknwebY6lFa/8C1Po9a68DVYPqDD94Imd8xoicO2Qwwwt7LCu4wiDJea4XFROYhwxXRctaaxxHMRSPu+wo6aaJmjGNC7Yc4rvawnXY6sf7nqa8eQZGBoDk4UL/k++3Wd/sPdJhRC8vceKdcV4gs0yDnLnk2EgEvYTVLkC/Pb+/nVwTSAoJ8onRSqB7fcUXcIfSpAuoBMDheOdg0HnMwEh4tHCYkICAVALSUIJXmPUEAikAVBj6THl2EEgiMTJImNOqYANmcSj+YmGayiqxmXHdcQMJISMU7CpqQFWzgJ/NBscapIki0gRFZMqraSSi5RStBxRbJo0OxUtqmpatVmybGLF1MyqtRprQjSllqrVaq2t8czGzI1fNwa01mNPPXdxvXTt1mtvA/qMPGSUocNGHW3GmSb6McvUabPOtsKCSisvWWXpslVX21BtJ7fzll22btt1t3fUHlh/eH8CtfCgFi+kzkB9R42rqm9ThCMncjADMKpIAHE9EEDoeDDzFnKOB7mDma+RrJDIIuVgNsNBDATzClF2eMPOxRvRg9z/hJvT/AG3+FXk3IHuk8j9iNsr1OYpQ+NC7M7CE1SfyD7GtGj8Uat+PLqf3fjs8Z+J/o4TdRtT+pCpm7SAw0P87CTbCrpIklGSV8i3XWmjbOhGWtTWz9nYfVZubn++7SEk2EwDxa1tFauDL3LqXE+UOx45bMbuuL12W7XFKlgdxLrraH6RRlBZ29S2pGbht7VOX8mwZdeCyexvlu7sNwXp9URpaZ9Z90pznk2yxWWlp9jZfUilUqNIV/SqhzSIyhjuxIy6byOQuixbYl/U9Skhr7qRpV3zyJlKrshPR222JNPMjDVqnZcumTVH9TWfF1Zia0xEbWa8wl7RUBkjmEfbGhYHSQ2jNRQAMBQwSy+1ruh7n7FNV9sphUf26ugVteU5ic31EFaVgQSNENvqtSV0tS/mK8t6T1io5suDmYj7JWb7KOQN2s7l/41atNV6UaqDtDaEukInsdhQSUNzAkUEdq44tq9zzwHVA/o9y7gNO4zru4+5piDAFA/Qog7sRr0aKDIFsHcF0BT26HNBAj8pBOKrgiuB2NnFJC1RVsaaNEr5wEBuzFaqFGDatEzp2L3jTyol7BCFQPudyZfVeVcRm+KMp2tJqxSKV+VPIzgUJltNPaN0x7wT4FBRsD0eTHwdK4e1sjYBFjXZw+GNREMrGaYGwdZRMZlQdhZQ26E2ClGiRgXlZ9Kxp/Qm/pQynlmyRLbmqf3lYqHt0C0KasH6Fo1I99W6ZkBfA5OWskDheiDYOjXPkBsbxVJLX+I1TZeVOMPSqaccRqrfGBvjNRMRC5lMwSeYXGe0Sz89ul8N+NNjoN6z2wrAbuIxQBKWqp87hZWw9ft0VjuVHYpaXntBIIRvRvLr6qVABB6tk+abeLek5JoQx5l8Jej1eNjZN6bGNtV9y8RPYAaaZbKNLCRnQgA+1HFpQYpb3tgiU7cmHOnellrM9bgNIpgzra6N4gm1PxgnhexQB11uQ0ngHvZxTYT15DpAuJ8rzOcExv1cYX4hMPpRYAi24Yc6wA8KzjIMeMeqN0BQEqChOMJGo+U4NzYMO5ROnLuQHbgkrB/SqdNBaspQu/OfdumWmtPvf+7ofjmwGTADx1H4ePQvUySxiuhfSZgzjHBrc7lcnwoKJGKd/KumYfq7aGoFjE5BpGKWDWjZ6qm0pyVW9GGvnSg4KsUFpCWiOQvCjc3GRwF38iRd/DAsJOSFHify9ZhS8SuPs1joYWvkjSBDSKh+U4QGuGZlfQ9FMK7tsBAj3pAnWLIgKMa11IX5poILvvowjlq1aNehHHPS626oEeZZbjaKGKJC9sTFg2kA6rAA3EjwFpSvb5OFQO08asC4d3PRD1YXR6fGILUXPUqjp2Bt0ONiB7IyWA7B7PAiNu0BXpycQu0qXR055W5i9NkgBkBd3KAXUEw87XiusOovUcN9hTOvKOFeceIrlHCvOPEVSrhXnPgKJdwrTnyFEu4VJ75CCfeKE1+hhPuqbPxURrCGxx226WnfjjuUELMFNnHMiL/N4bFMxxzS41FqsFCyuQYpWnBt4Dd6GXS04psed7kEEaa7rXOa3PIbNvIrBfk9NcIARwblBHvij/xq9y6tno/+w4JT7NB/rE87nbBBxRQqrgf9p0vXU49v/Q+K/uvR/wx5oVNKDnvb46X/FB26bKhth4l7YJP+YsIecNzvSNjfgtqC8bgpc5SWxzAeKxho+8um3vYLJfBgcYvdEBeZ+MLT5gBvkXOmVPfLJ2AtHf7h7n4KhL3TlC8R69Yx01eF+3lgvomLg/Zvccnxc2H5cHS/gdT/TPS3mgi2zur+CzQiZTFaXNByAAABhWlDQ1BJQ0MgcHJvZmlsZQAAeJx9kT1Iw0AcxV9btUVaFOwg4pChOlkQv3CUKhbBQmkrtOpgcukXNGlIUlwcBdeCgx+LVQcXZ10dXAVB8APE0clJ0UVK/F9SaBHjwXE/3t173L0DvI0KU4yucUBRTT0VjwnZ3Krgf0UPAgihH9MiM7REejED1/F1Dw9f76I8y/3cnyMk5w0GeATiOabpJvEG8cymqXHeJw6zkigTnxOP6XRB4keuSw6/cS7a7OWZYT2TmicOEwvFDpY6mJV0hXiKOCIrKuV7sw7LnLc4K5Uaa92TvzCYV1fSXKc5jDiWkEASAiTUUEYFJqK0qqQYSNF+zMU/ZPuT5JLIVQYjxwKqUCDafvA/+N2tUZiccJKCMaD7xbI+RgD/LtCsW9b3sWU1TwDfM3Cltv3VBjD7SXq9rUWOgL5t4OK6rUl7wOUOMPikibpoSz6a3kIBeD+jb8oBA7dA75rTW2sfpw9AhrpavgEODoHRImWvu7w70Nnbv2da/f0AftJyrPVDtLgAAA0YaVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/Pgo8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAgQ29yZSA0LjQuMC1FeGl2MiI+CiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczpHSU1QPSJodHRwOi8vd3d3LmdpbXAub3JnL3htcC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgeG1wTU06RG9jdW1lbnRJRD0iZ2ltcDpkb2NpZDpnaW1wOjNlNzIzNWM1LWQ5MzItNGQxMi1iNTliLTljZTI2NzRjNmU4NCIKICAgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3M2VkM2U3Mi0zYjZlLTRkZTYtYTVmNC1jZTJkZTAzYjg1ZmMiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpjNDY3YzU1My1iNDM5LTQ0ZWEtYmIzOS1iNjc0N2RiYWRhZmMiCiAgIGRjOkZvcm1hdD0iaW1hZ2UvcG5nIgogICBHSU1QOkFQST0iMi4wIgogICBHSU1QOlBsYXRmb3JtPSJXaW5kb3dzIgogICBHSU1QOlRpbWVTdGFtcD0iMTY1NDY5NDUzMDMwNzk1NCIKICAgR0lNUDpWZXJzaW9uPSIyLjEwLjMwIgogICB0aWZmOk9yaWVudGF0aW9uPSIxIgogICB4bXA6Q3JlYXRvclRvb2w9IkdJTVAgMi4xMCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDpjaGFuZ2VkPSIvIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjRhYTc2ZTY2LTU3MjQtNDFiZC1iODQwLWIyYzU5ODhmNzUxNyIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iR2ltcCAyLjEwIChXaW5kb3dzKSIKICAgICAgc3RFdnQ6d2hlbj0iMjAyMi0wNi0wOFQxODoyMjoxMCIvPgogICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz6/eJONAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAB3RJTUUH5gYIDRYKsqhA6gAAANJJREFUaN7t2b0NgzAQBeAHyhqsYaZAYgqLkRBTIGWKUGQJJNYwhZUiVZq7Z53yrnKF3if8c5a7UkpB4OoRvAQQQAABBBBAAAH+GfCw+tDzdWI76jgnYBqHWIDtAN5XHS87AJwUhNsUWvb6V8IAcmqDMANM44B15iNMp1ALhPkaYCNcFjET4bYLsRCuJzEDoV7oV3tRT+XvWme7VqOPHN4NwArvAmCGNweww5sCWoQ3BXwuM8zwrrsQI7zpjSwnNLlSdnqhEUAAAQQQQAABBBCgWd2Bq15OnVwyJwAAAABJRU5ErkJggg=="
                                        alt="">

                            </div>

                        </td>
                        <td class="section__small-blocks-table__gap"></td>
                        <td class="small-data-block small-data-block_inline" id="business-entities_block">
                            <div class="small-data-block__icon-part small-data-block__icon-part_inline">

                                <img
                                        class="small-data-block__icon-img small-data-block__icon-img_inline"
                                        style="width: 17px; height: 21px; margin-top: 3px;"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAZCAYAAADe1WXtAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAALTSURBVHgBlVWxbhNBEJ2Z20sMCsSiShfTESlSDEUoSdoUAb4gFFSpoECUSY8QKREV+QKk5AOSVAQoEAIJCQpfKiiNkAvL8g4zs7f23dnIl7Xs9e7OvH3zZnYXYev9I0roFRI2kRKmBBCJgIgY5b+syQ9C7EHnEc+40XvYPbjdhSlNzHAPABd1gMjihQyoA5vhYIbA+uEwRIQNGlw9aT753JwGirh1LoyI/fE6wYx2/fH3vSShPWEs1HVz/uJdb7PKOAdihBpNVAHl6tG/lX8XhNRO+doEY2KwyGo173V/BvJJ5tPhprhlArGWQhk4MK3FMzeWJHjw0D1YyYbJYFNmLiSz7blkUYA7BiyJ4pqQFXBpCjzAvgJnIvLafIonS887LWc0GesJIKLmdbBxY/enlp1oIu7Ep4KyI982Mr1zwbomW/JnLAgS3oaM7kn2pWRFDzR3VnJSGe0AWlOA7uuV0+bujzvicD/4oeZNsaUXcOJ9Ex22zj0liP74rkHT9sdO2nAt15hj6cHNO5Q++/WidXPWpkvPMlZJphQ8t0rsVXLAZajRogtN6JmnrHe4St03tyioVU/zmG1C02Wc/Vz0suEli84FZMDhCOT/1UXbH0TvueX0ikPXSFVvcKnLfr+MeqNdOVQFwiotLhBlaFm2g9BWQsKooHeQiWafe+RootJo/f89XEXV22qpkBOrWekoshntZbQLJ8yKMIzZrtSicfkkhjXOb6lCxGGzQrZ1E8zH8RIvhjsRqV61FRF5mlVkxDlQ0bzkjRaoq2LEPRZ2vrKbT0OWcqax3BZ2vtlps5hKLCySyRPFJYWRJ2+wqG9Yq0aqQ8dB7tGCP1qnvvR9mGzDo3Wr52lr40g0fOQ/UgSLyYNPeo+xPsV6wehzPH6abU52z9cpPOP6+Jmt6pPE+w8yrdOn+ohZKeehcP4aj4+sVbqdvJgoDjnCUczBsSt++/8A7MEX8myZwZoAAAAASUVORK5CYII="
                                        alt="">

                            </div>
                            <div class="small-data-block__text-part small-data-block__text-part_inline">Хозяйствующие субъекты</div>
                            <div class="small-data-block__array">

                                <img
                                        src="data:image/png;base64,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d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczpHSU1QPSJodHRwOi8vd3d3LmdpbXAub3JnL3htcC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgeG1wTU06RG9jdW1lbnRJRD0iZ2ltcDpkb2NpZDpnaW1wOjNlNzIzNWM1LWQ5MzItNGQxMi1iNTliLTljZTI2NzRjNmU4NCIKICAgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3M2VkM2U3Mi0zYjZlLTRkZTYtYTVmNC1jZTJkZTAzYjg1ZmMiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpjNDY3YzU1My1iNDM5LTQ0ZWEtYmIzOS1iNjc0N2RiYWRhZmMiCiAgIGRjOkZvcm1hdD0iaW1hZ2UvcG5nIgogICBHSU1QOkFQST0iMi4wIgogICBHSU1QOlBsYXRmb3JtPSJXaW5kb3dzIgogICBHSU1QOlRpbWVTdGFtcD0iMTY1NDY5NDUzMDMwNzk1NCIKICAgR0lNUDpWZXJzaW9uPSIyLjEwLjMwIgogICB0aWZmOk9yaWVudGF0aW9uPSIxIgogICB4bXA6Q3JlYXRvclRvb2w9IkdJTVAgMi4xMCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDpjaGFuZ2VkPSIvIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjRhYTc2ZTY2LTU3MjQtNDFiZC1iODQwLWIyYzU5ODhmNzUxNyIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iR2ltcCAyLjEwIChXaW5kb3dzKSIKICAgICAgc3RFdnQ6d2hlbj0iMjAyMi0wNi0wOFQxODoyMjoxMCIvPgogICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz6/eJONAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAB3RJTUUH5gYIDRYKsqhA6gAAANJJREFUaN7t2b0NgzAQBeAHyhqsYaZAYgqLkRBTIGWKUGQJJNYwhZUiVZq7Z53yrnKF3if8c5a7UkpB4OoRvAQQQAABBBBAAAH+GfCw+tDzdWI76jgnYBqHWIDtAN5XHS87AJwUhNsUWvb6V8IAcmqDMANM44B15iNMp1ALhPkaYCNcFjET4bYLsRCuJzEDoV7oV3tRT+XvWme7VqOPHN4NwArvAmCGNweww5sCWoQ3BXwuM8zwrrsQI7zpjSwnNLlSdnqhEUAAAQQQQAABBBCgWd2Bq15OnVwyJwAAAABJRU5ErkJggg=="
                                        alt="">

                            </div>

                        </td>
                        <td class="section__small-blocks-table__gap"></td>
                        <td class="small-data-block small-data-block_inline" id="maps_block" onclick="window.open('http://sioprmain.mos.ru/egip/umap/index.html?session=&layer_id=&layer_revision_id=current&feature_id=','_blank')">
                            <div class="small-data-block__icon-part small-data-block__icon-part_inline">

                                <img
                                        class="small-data-block__icon-img small-data-block__icon-img_inline"
                                        style="width: 21px; height: 21px; margin-top: 3px;"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAANXSURBVHgBnVa9a1NRFD8fLyKiEnFxERNxEUQaEBx9jopgBQcnrbqIg8bB1aSzoAYXFzX9BzSLq6aDKDqkoKjgkLgpFBoVwY++e/zd+9IP2/deaw80j957zu/8zse95zLlyOYzvZiIG6I8RsIdp8nkz3ZtQOuUXdf7E8zSgO2AV4Gffh0bKTblCAuRqLD/MjOxcJfUtb7fP9jJAi7X++USJeOisGeqeBsRoUUn0fjrGJ8Gq8QiTCYyJ2xfYVCBVg9rNeyZ9yhKn+CxSeKmh/f2Dzx45ObrRHoFmDs8KdAaSCTeloTGn4/xiVfPzNFT7MRkNDSz5pZftheKXcICm7Qima+SJReI3CczquDbZtPezssfH+ufpG/GN5hth5HrJsbxl1vVqrcNAfBveQxGFSMZIiF3/jhp0aPa8Heoy8xiKoZpPdr+b9uFtxOqpbPwfhQOTwLcJ6ZrTpqzd6vTSwn0iWKL8LMH4OS+laquWxuuSrSNdJfJ9wcHgrPypfcTwvqQjDuzd/edokwxnz1LITIciKx2sFzUQ4CECc1Rgfi+CVnP2nSOCiVJmULRMqmAQMCVFN0xbUA0/MI0baccQduE0hTkBF1jVCg+X5apwyNgsTStuQBMtkaUgJBCEjyKJE+4sPBLRPL34MNAwzZUj2VAbDkN4lPtUxb5+2WhC/5fdBRpNtG0JqNsstAGo0lCRTnH2pMPl1Ihht+1QheerhV1YGjw0H1W5CMfQEVTN5wbS9rCvGam8hsjcaMznx9HiGCNc7KgmC1KawkI+vt5oQMyVYzKaSRJ5n5C+eIHWcgioKPANVySS7L5dC82pQacxOlp5fbWc28mTKL2j4f7p1YQwZF2/4BvYlfXSK74/51RPwrJGtXNj2BWbjhyMYL0FZ0DxjRGLiYmHxGsb7/4Do8LnfSjNxDkdMAGcHJ1ZPcq9MvOmT+IXWV3jfn4S+fx8GAY4JIJwx+DZA62rS3z1Bp2asPymV4lKSkI4IGgqY6/kFhpBoBj8DWA4zLOW9mvg3ZXo1Lz883dKRE6/gLhqoVHhXAfS5NJ59BUXq63nf9wUiOrQzcO17h6j/iiuiwYwcLN2dvLR7B3cuzFM2xixlOTnhyeonUKRm8FvPB00nG4mWGJVsz3JfkL791CmOuqApcAAAAASUVORK5CYII="
                                        alt="">

                            </div>
                            <div class="small-data-block__text-part small-data-block__text-part_inline">Интерактивные карты</div>
                            <div class="small-data-block__array">

                                <img
                                        src="data:image/png;base64,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d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczpHSU1QPSJodHRwOi8vd3d3LmdpbXAub3JnL3htcC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgeG1wTU06RG9jdW1lbnRJRD0iZ2ltcDpkb2NpZDpnaW1wOjNlNzIzNWM1LWQ5MzItNGQxMi1iNTliLTljZTI2NzRjNmU4NCIKICAgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3M2VkM2U3Mi0zYjZlLTRkZTYtYTVmNC1jZTJkZTAzYjg1ZmMiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpjNDY3YzU1My1iNDM5LTQ0ZWEtYmIzOS1iNjc0N2RiYWRhZmMiCiAgIGRjOkZvcm1hdD0iaW1hZ2UvcG5nIgogICBHSU1QOkFQST0iMi4wIgogICBHSU1QOlBsYXRmb3JtPSJXaW5kb3dzIgogICBHSU1QOlRpbWVTdGFtcD0iMTY1NDY5NDUzMDMwNzk1NCIKICAgR0lNUDpWZXJzaW9uPSIyLjEwLjMwIgogICB0aWZmOk9yaWVudGF0aW9uPSIxIgogICB4bXA6Q3JlYXRvclRvb2w9IkdJTVAgMi4xMCI+CiAgIDx4bXBNTTpIaXN0b3J5PgogICAgPHJkZjpTZXE+CiAgICAgPHJkZjpsaQogICAgICBzdEV2dDphY3Rpb249InNhdmVkIgogICAgICBzdEV2dDpjaGFuZ2VkPSIvIgogICAgICBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjRhYTc2ZTY2LTU3MjQtNDFiZC1iODQwLWIyYzU5ODhmNzUxNyIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iR2ltcCAyLjEwIChXaW5kb3dzKSIKICAgICAgc3RFdnQ6d2hlbj0iMjAyMi0wNi0wOFQxODoyMjoxMCIvPgogICAgPC9yZGY6U2VxPgogICA8L3htcE1NOkhpc3Rvcnk+CiAgPC9yZGY6RGVzY3JpcHRpb24+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgCjw/eHBhY2tldCBlbmQ9InciPz6/eJONAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAB3RJTUUH5gYIDRYKsqhA6gAAANJJREFUaN7t2b0NgzAQBeAHyhqsYaZAYgqLkRBTIGWKUGQJJNYwhZUiVZq7Z53yrnKF3if8c5a7UkpB4OoRvAQQQAABBBBAAAH+GfCw+tDzdWI76jgnYBqHWIDtAN5XHS87AJwUhNsUWvb6V8IAcmqDMANM44B15iNMp1ALhPkaYCNcFjET4bYLsRCuJzEDoV7oV3tRT+XvWme7VqOPHN4NwArvAmCGNweww5sCWoQ3BXwuM8zwrrsQI7zpjSwnNLlSdnqhEUAAAQQQQAABBBCgWd2Bq15OnVwyJwAAAABJRU5ErkJggg=="
                                        alt="">

                            </div>

                        </td>
                    </tr>
                    </tbody>
                </table>


                <!-- Размер отступа внутри "_isbs-dashboard-category" -->







                <table class="section__big-blocks-table">
                    <tbody>







                    <tr class="section__big-blocks-table__row" style="z-index: 400" >







                        <td class="big-data-block" id="infoBlock1" colspan="2">



                            <div class="big-data-block__header">

                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Статистика по предприятиям оптовой торговли/склад</td>
                                        <td class="big-data-block__header__resize-button">

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_1"
                                     style="overflow: hidden; height:460px ">

                                </div>

                            </div>
                        </td>



                        <td class="section__big-blocks-table__gap" style="width: 15px;"></td>




                        <td class="big-data-block" id="infoBlock2" colspan="1">



                            <div class="big-data-block__header big-data-block__header_without-border">

                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Вакцинация</td>
                                        <td class="big-data-block__header__resize-button">

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_2"
                                     style="overflow: hidden; height:460px ">

                                </div>

                            </div>
                        </td>



                        <td class="section__big-blocks-table__gap" style="width: 15px;"></td>




                        <td class="big-data-block" id="infoBlock3" colspan="1">



                            <div class="big-data-block__header big-data-block__header_without-border">

                                <table class="big-data-block__header-table">
                                    <tbody>
                                    <tr>
                                        <td class="big-data-block__header__text">Отчеты</td>
                                        <td class="big-data-block__header__resize-button">

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="big-data-block__content">
                                <div class="big-data-block__horizontal-chart  big-data-block__container " id="chart_3"
                                     style="overflow: hidden; height:460px ">

                                </div>

                            </div>
                        </td>

                    <tr class="section__big-blocks-table__row-gap"></tr>


                    <!--    <tr class="section__big-blocks-table__row-gap"></tr>-->
                    <tr class="section__big-blocks-table__row"></tr>
                    </tbody>
                </table>



            </div>
        </div>
    </div>
</div>
</body>

<script language="JavaScript">
    $(document).ready(function() {
        attachButtonsEventPerformers();

        init(460);

        initLinkBlock();
        startInitChart();
		$(".small-data-block").off();
		$('#wholesalers_block').on('click',function(){
			window.open('/dashboard/table/1328?rel_id=10141','_blank')
		});
		$('#wholesale-objects_block').on('click',function(){
			window.open('/dashboard/table/10012?rel_id=10011','_blank')
		});
		$('#business-entities_block').on('click',function(){
			window.open('/dashboard/table/845?rel_id=1834','_blank')
		});
    });

    //Получаем текущую дату
    var date = new Date();
    var dd = String(date.getDate()).padStart(2, '0');
    var mm = String(date.getMonth() + 1).padStart(2, '0');
    var yyyy = date.getFullYear();
    date = dd + '.' + mm + '.' + yyyy;

    function initLinkBlock() {
        let data = [];
        let hrefs = [
            {"title":"Данные по вакцинации субъектов", "id":"Документ.юк_ДанныеПоВакцинацииХозСубъектов.Форма.ФормаСписка"},
            {"title":"Причины не выполнения", "id":"Справочник.юк_ПричиныНеВыполненияВакцинации.ФормаСписка"},
            {"title":"Хозяйствующий субъекты вакцинации", "id":"Справочник.юк_ХозяйствующийСубъектыВакцинации.Форма.ФормаСписка"},
        ];
        let hrefs2 = [
            {"title":"Достижение целевых показателей по вакцинации для Оптовой торговли ", "id":"1302"},
            {"title":"Достижение целевых показателей по вакцинации для Оптовой торговли с ИНН", "id":"1302"},
            {"title":"Категорирование предприятий оптовой торговли", "id":"1059?variant=Категорирование%20предприятий%20оптовой%20торговли"},
            {"title":"Количество оптовых предприятий по округам города Москвы", "id":"1154"},
            {"title":"Количество стационарных торговых объектов(Опт)", "id":"1079"},
            {"title":"Количество химически опасных объектов по округам", "id":"1290"},
            {"title":"Отчет об объёмах операций организаций ", "id":"1296"},
            {"title":"Оформление анкет безопасности", "id":"1285"},
            {"title":"Оформление договоров на вывоз мусора (Оптовая торговля)", "id":"1056?variant=Опт"},
            {"title":"Перечень объектов(Опт)", "id":"1071"},
            {"title":"Перечень прокатегорированных предприятий оптовой торговли", "id":"1059?variant=Перечень%20прокатегорированных%20предприятия%20оптовой%20торговли"},
            {"title":"Рассылка по предприятиям оптовой торговли", "id":"1289"},
            {"title":"Регистрация объекта оптовой торговли по адресу предприятия оптовой торговли", "id":"1301"},
            {"title":"Соблюдение предписаний РПН (Оптовая торговля)", "id":"1271?variant=Основной3"},
            {"title":"Характеристики действующих арендаторов складских помещений по округам города Москвы", "id":"1219"},
        ];
        data.block0 = {"hrefs": hrefs};
        data.block1 = {"hrefs": hrefs2};
        getInfoBlock(data);
    }

    function startInitChart(district = "Неопределено", sto = true, dateFlag = false) {
        if(dateFlag)
            date = $('input.cd-header-menu__input').val();

        tmpDate = date.split('.');
        qData = tmpDate[2] + '-' + tmpDate[1] + "-" + tmpDate[0];

        if(district == "" || district == "Все")
            district = "Неопределено";

        var getData = [];
        var param = utf8_to_b64('param1='+district+'&date2='+qData+'&bool3='+sto);
        $.ajax({
            type: 'POST',
            url: 'selector_1s.php', // Обработчик собственно
            data: "wp=Opt&func=ВернутьДанныеПоОпт&param="+param,
            success: function(data) {
                var datax = JSON.parse(data);
                getData =
                    {
                        "categories": datax["ОкругРайон"],
                        "series": [
                            {
                                "name": "Количество",
                                "color": [
                                    "#BEE9FF",
                                    "#40B3EE",
                                ]
                                ,
                                "data": datax["Опт"]
                            }
                        ]
                    };
				totalSum = datax["Опт"].reduce((accumulator, currentValue) => accumulator + currentValue, 0);
                initChart(getData,getTabs(sto, totalSum),getSidebar(district));
            },
            error:  function(){
                alert('Ошибка получения данных для функции getData');
            }
        });
    }

    function getTabs(sto, totalSum) {
        var out = {
            "selectedDate": date,
            "comboBoxItems": [
                {
                    "id": 1,
                    "text": "Предприятия оптовой торговли",
                    "buttonId": "comboBoxItem_1_1",
                    "selected": sto,
                },
                {
                    "id": 2,
                    "text": "Объекты оптовой торговли",
                    "buttonId": "comboBoxItem_1_2",
                    "selected": !sto,
                },
            ],
			"totalItems": [{"name":totalSum}]
        };
        return out;
    }

    function getSidebar(district) {
        if(district == "Неопределено")
            district = "Все";
        var out = {"selectedCategory": district};
        return out;
    }

    function utf8_to_b64( str ) {
        return window.btoa(unescape(encodeURIComponent( str )));
    }
    function selectDayX() {
        var sto = $('.tab-custom-select__list-item.tab-custom-select__list-item_selected').data('id');
        if(sto == 2)
            sto = false;
        else
            sto = true;
        startInitChart($('.chart-sidebar-content__item.colors-secondary-faded').text(), sto, true);
    };
</script>
</html>
