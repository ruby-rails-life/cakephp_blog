<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <caption><strong>Universes</strong></caption>
      <tbody>
        <?php
          foreach($universes as $value) {
        ?>  
        <tr>
          <!--
          <td>
            <?php if (count($value->plants) >0) { ?> Plants: <?php } ?>
            <?php
              foreach($value->plants as $plant) {
                echo $plant->name_en . ',';
              }
            ?>
          </td>
          <td><?= $value['slug'] ?></td>
          -->
          <td><?= $value['name'] ?></td>
          <td><?= $value['weight'] ?></td>
          <td><?= $value['total_plants'] ?></td>
          <td><?= $value['name_weight'] ?></td>
        </tr>
        <?php } ?>

        <tr>
        <?php
          foreach($universes_arr as $value) {
        ?>
          <td><?= h($value) ?></td>
        <?php } ?>
        </tr>

        <tr>
        <?php
          foreach($universes_list as $key => $value) {
        ?>
          <td><?= h($key) ?>:<?= h($value) ?></td>
        <?php } ?>
        </tr>

      </tbody>
    </table>
  </div>
</div>          

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <caption><strong>Collection</strong></caption>
      <tbody>
        <tr>
          <td>
            Map(value * 2)
          </td>
        </tr>
        <tr>
        <?php
          $map_col->each(function ($value, $key) {
        ?>
          <td class="col-md-2"><?= $key ?>:<?= $value ?></td>
        <?php }); ?>
        </tr>
        <tr>
          <td>
            Unfold
          </td>
        </tr>
        <tr>
        <?php
          foreach($unfold_list2 as $value) { 
        ?>
          <td><?= $value ?></td>
        <?php } ?>
        </tr>
        <tr>
          <td>
            Chunk
          </td>
        </tr>
        <tr>
        <?php 
          foreach($chunk_list as $out_arr) {
        ?>
        <td>
        <?php
            foreach($out_arr as $value) { 
        ?>
          <?= $value ?>:
        <?php } ?>
        </td>  
        <?php } ?>
        </tr>
        <tr>
          <td>
            chunkWithKeys
          </td>
        </tr>
        <tr>
        <?php 
          foreach($chunk_list2 as $out_arr) {
        ?>
        <td>
        <?php
            foreach($out_arr as $key => $value) {
              if (is_array($value)) $value="配列"; 
        ?>
          <?= $key ?>:<?= $value ?>
        <?php } ?>
        </td>  
        <?php } ?>
        </tr>
        
        <tr>
          <td>
            Reject
          </td>
        </tr>
        <tr>
        <?php
          foreach($reject_arr as $value) { 
        ?>
          <td><?= $value ?></td>
        <?php } ?>
        </tr>
        <tr>
          <td>
            Every(<?php var_dump($every_under20) ?>)
          </td>
        </tr>
        <tr>
          <td>
            Match
          </td>
        </tr>
        <tr>
        <?php
          foreach($match_arr as $in_arr) {
        ?>
        <td>
        <?php
            foreach($in_arr as $key => $value) {
        ?>
          <?= $key ?>:<?= $value ?>
        <?php } ?>
        |</td>
        <?php } ?>
        </tr>
        <tr>
          <td>
            Zip
          </td>
        </tr>
        <tr>
        <?php
          foreach($zip_list as $in_arr) {
        ?>
        <td>
        <?php
          foreach($in_arr as $value) {
        ?>
          <?= $value ?>,
        <?php } ?>
        </td>
        <?php } ?>
        </tr>
        <tr>
          <td>
            Zip2
          </td>
        </tr>
        <tr>
        <?php
          foreach($zip_list2 as $in_arr) {
        ?>
        <td>
        <?php
          foreach($in_arr as $value) {
        ?>
          <?= $value ?>,
        <?php } ?>
        </td>
        <?php } ?>
        </tr>
        <tr>
          <td>
            Shuffle
          </td>
        </tr>
        <tr>
        <?php
          foreach($shuffle_arr as $value) { 
        ?>
          <td><?= $value ?></td>
        <?php } ?>
        </tr>

        <tr>
          <td>
            Transpose
          </td>
        </tr>
        <tr>
        <?php
          foreach($transpose_list as $in_arr) {
        ?>
        <td>
        <?php
          foreach($in_arr as $value) {
        ?>
          <?= $value ?>,
        <?php } ?>
        </td>
        <?php } ?>
        </tr>
        <tr>
          <td>
            Insert
          </td>
        </tr>
        <tr>
        <?php
          foreach($insert_arr as $in_arr) {
        ?>
        <td>
        <?php
          foreach($in_arr as $key => $value) {
            if (is_array($value)) {
              echo $key . ':';
              foreach($value as $val) {
                echo $val . ',';
              }
            } else { 
        ?>
          <?= $key ?>:<?= $value ?>,
        <?php }} ?>
        </td>
        <?php } ?>
        </tr>
      </tbody>
    </table>
  </div>
</div>        

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <caption><strong>Helper</strong><small>($this->Text->)</small></caption>
      <tbody>
        <tr>
          <td class="col-md-2">autoLinkEmails</td>
          <td class="col-md-10">
            <?php 
              $myText = 'For more information regarding our world-famous ' .
                        'pastries and desserts, contact info@example.com';
              $linkedText = $this->Text->autoLinkEmails($myText);
              echo $linkedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>autoLinkUrls</td>
          <td>
            <?php 
              $myText = 'Welcome http://www.epochtimes.jp';
              $linkedText = $this->Text->autoLinkUrls($myText);
              echo $linkedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>autoLink</td>
          <td>
            <?php 
              $myText = 'Welcome http://www.epochtimes.jp Contact info@epochtimes.jp';
              $linkedText = $this->Text->autoLink($myText);
              echo $linkedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>autoParagraph</td>
          <td>
            <?php 
              $myText = 'For more information
              regarding our world-famous pastries and desserts.

              contact info@example.com';
              $formattedText = $this->Text->autoParagraph($myText);
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>highlight</td>
          <td>
            <?php 
              $lastSentence = 'デフォルトの文字列を使って $haystack 中の $needle をハイライトします。';
              $formattedText = $this->Text->highlight(
                $lastSentence,
                '使って',
                ['format' => '<span style="color:red">\1</span>']
              );
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>truncate</td>
          <td>
            <?php 
              $lastSentence = 'For more information';
              $formattedText = $this->Text->truncate(
                $lastSentence, 5);
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>tail</td>
          <td>
            <?php 
              $lastSentence = 'For more information';
              $formattedText = $this->Text->tail(
                $lastSentence, 8);
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>excerpt</td>
          <td>
            <?php 
              $lastParagraph = 'For more information';
              $formattedText = $this->Text->excerpt($lastParagraph, 'more', 5, '...');
              echo $formattedText;
            ?>
          </td>
        </tr>
        <tr>
          <td>toList</td>
          <td>
            <?php 
              $colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
              echo $this->Text->toList($colors);
            ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>        

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <caption><strong>i18n</strong></caption>
      <tbody>
        <tr>
          <td class="col-md-4"><?= __x('weather', 'fine') ?></td>
          <td class="col-md-4"><?= __x('mood', 'fine') ?></td>
          <td><?= __('placeholder_msg', [5423.344, 5.1]) ?></td>
        </tr>
        <tr>
          <td class="col-md-4">
            <?= __d('colors', 'green') ?>|<?= __('animals', 'cat') ?>
          </td>
          <td>
            <?= __('{0,plural,=0{No records found} =1{Found 1 record} other{Found # records}}', [2]) ?>
          </td>
          <td>
            <?= __('{placeholder,plural,=0{No records found} =1{Found 1 record} other{Found {1} records}}', [0, 'many', 'placeholder' => 2]) ?>
          </td>
        </tr>
      </tbody>     
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <caption><strong>Session</strong></caption>
      <tbody>
        <tr>
          <td class="col-md-6"><?= $this->request->session()->read('Config.theme') ?></td>
          <td class="col-md-6"><?= $this->request->session()->read('Config.language') ?></td>
        </tr>
      </tbody>     
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <span><strong>MathComponent : <?= $mathComponent ?></strong></span>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped">
      <caption>Chronos</caption>
      <tbody>
        <tr>
          <td class="col-md-2">Now</td>
          <td><?= $now ?></td>
        </tr>
        <tr>
          <td>Time</td>
          <td><?= $time ?></td>
        </tr>
        <tr>
          <td>Time:Quarter</td>
          <td><?= $time->toQuarter() ?></td>
        </tr>
        <tr>
          <td>XML</td>
          <td><?= debug($xmlString) ?></td>
        </tr>
      </tbody>  
    </table>
  </div>
</div>
