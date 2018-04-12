<?php
/* Smarty version 3.1.31, created on 2018-04-12 18:18:43
  from "/Users/qhMo0n/Desktop/WhaleFall-FrameWork/View/Test.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5acf328378ec84_74550549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcd02df35b4fbc4521265e4e9dd48ed932d89fbb' => 
    array (
      0 => '/Users/qhMo0n/Desktop/WhaleFall-FrameWork/View/Test.html',
      1 => 1523527118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5acf328378ec84_74550549 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '10720922345acf328375b824_78469380';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
<li>序号:<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
 姓名: <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 年龄: <?php echo $_smarty_tpl->tpl_vars['item']->value['age'];?>
</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<form action="./change" method="post">
    id:<input type="text" name="id">
    年龄: <input type="text" name="age">
    <button>提交更改</button>
</form>
</body>
</html><?php }
}
