<?php

/**
 * @package PostTitleIcon
 * @version 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php if($icons): ?>
<div class="wrap">
  <h1>Нашатування плагіну </h1>

  <div id="ajax-message" class="error"></div>

  <div class="post-type-pti">
    <h4>Обрати тип посту:</h4>
    <select class="" id="type_post" name="type_post">
      <option value="0">Обрати тип посту </option>
      <?php foreach ($post_types as $post_type):?>
        <option value="<?php echo $post_type; ?>"><?php echo $post_type; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-pti">
    <form  method="post">
      <div class="fields-icon">
        <h4>Обрати іконку:</h4>
        <table >
          <?php foreach($icons as $icon): ?>
            <tr>
              <td><input type="radio" name="icon" value="<?php echo $icon->id; ?>"></td>
              <td><span class="<?php echo $icon->icon; ?>"></span></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
      <div class="fields-post">
        <h4>Обрати пост :</h4>
        <table>

        </table>
      </div>
      <div class="float-fields">
        <h4>Обрати позицію для посту:</h4>
        <table>
          <tr>
            <td><input type="radio" name="float" value="left"></td>
            <td><strong>З лівої</strong></td>
          </tr>
        </table>
        <table>
          <tr>
            <td><input type="radio" name="float" value="right"></td>
            <td><strong>З правої </strong></td>
          </tr>
        </table>
      </div>
      <div class="save-button">
        <input type="submit" class="button-primary" name="save" value="Зберегти">
      </div>
    </form>
  </div>
</div>
<?php endif; ?>
