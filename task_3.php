<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <ol class="breadcrumb page-breadcrumb">





                                
                                <?php
                                    class Element{
                                        public $name;
                                        public $link;
                                        public $parent;
                                        public $is_folder;
                                        function __construct($name, $link, $parent, $is_folder = true){
                                            $this->name = $name;
                                            $this->link = $link;
                                            $this->parent = $parent;
                                            $this->is_folder = $is_folder;
                                        }
                                    }

                                    class Catalog{
                                        private $catalog = array();
                                        function addElement($name, $link, $parent, $is_folder = true){
                                            $this->catalog[] = new Element($name, $link, $parent, $is_folder);
                                        }

                                        function findChild($parent_link){
                                            foreach($this->catalog as $i){
                                                if($i->parent == $parent_link)
                                                    return $i;
                                            }
                                        }
                                    }

                                    $catalog = new Catalog;
                                    $catalog->addElement('Главная', '//route1.ru', null);
                                    $catalog->addElement('PHP', 'php', '//route1.ru');
                                    $catalog->addElement('Функции', 'functions', 'php');
                                    $catalog->addElement('phpinfo()', 'phpinfo', 'functions', false);

                                    
                                    $element = new Element(null, null, null);
                                    $link = '';
                                    while(true){
                                        $element = $catalog->findChild($element->link);
                                        $link .= $element->link . '/';

                                        if($element->is_folder){
                                            ?>
                                                <li class="breadcrumb-item"><a href="<?=$link?>"><?=$element->name?></a></li>
                                            <?php
                                        }else{
                                            ?>
                                                <li class="breadcrumb-item active"><?=$element->name?></a></li>
                                            <?php
                                            break;
                                        }
                                    }
                                ?>


                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
