<?php
/* Smarty version 3.1.30, created on 2016-10-18 02:54:51
  from "C:\xampp\htdocs\dashboard\sgarcia\PaginaMVC\admin\templates\datTec_admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580572db553311_79117484',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4e026c75fdc8932c8830f256b24920be5b887e4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\dashboard\\sgarcia\\PaginaMVC\\admin\\templates\\datTec_admin.tpl',
      1 => 1476752080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:list_DatTec_Admin.tpl' => 1,
  ),
),false)) {
function content_580572db553311_79117484 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action="" method="POST" enctype="multipart/form-data" id="add_dat_tec">
  <div class="form-group">
    <label for="maquina">Maquina</label>
    <select name="id_maq" class="form-control" id="id_maq">
    <option value="" disabled selected> Elija tipo de maquina</option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['maquinas']->value, 'maquina');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['maquina']->value) {
?>
     <?php if (!$_smarty_tpl->tpl_vars['maquina']->value['datos_tecnicos']) {?>
     <option value="<?php echo $_smarty_tpl->tpl_vars['maquina']->value['id_maq'];?>
"><?php echo $_smarty_tpl->tpl_vars['maquina']->value['id_maq'];?>
 -> <?php echo $_smarty_tpl->tpl_vars['maquina']->value['nombre'];?>
</option>
     <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

   </select>

    <label for="denominacion">Denominacion Tecnica</label>
    <input type="text" id="denominacion"  class="form-control dato" name="denominacion" placeholder="Denominacion" >

    <label for="potencia">Potencia</label>
    <input type="text" id="potencia" class="form-control dato" name="potencia" placeholder="Potencia" >

    <label for="altura">Altura</label>
    <input type="text" id="altura" class="form-control dato" name="altura" placeholder="Altura (1,7 mts)">

    <label for="ancho">Ancho</label>
    <input type="text" id="ancho" class="form-control dato" name="ancho" placeholder="Ancho (1,7 mts)" >

    <label for="peso">Peso</label>
    <input type="text" id="peso" class="form-control dato" name="peso" placeholder="Peso">

    <label for="capacidad">Capacidad de trabajo</label>
    <input type="text" id="capacidad" class="form-control dato" name="capacidad" placeholder="Capacidad Tn/Hr">
  </div>

   <button type="submit" id="guardarDat" class="btn btn-default">Cargar</button>
</form>

<div id="listDatTec">
<?php $_smarty_tpl->_subTemplateRender("file:list_DatTec_Admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php echo '<script'; ?>
 src="js/cargarDatTec.js"><?php echo '</script'; ?>
>
<?php }
}
