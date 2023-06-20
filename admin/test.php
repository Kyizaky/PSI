<p><?php echo date('Y-m-d')?></p>
<p><?php echo date('Y-m-d', strtotime(date('Y-m-d').'+ 7 days'))?> </p>
<input type="date"  max="<?php echo date('Y-m-d', strtotime(date('Y-m-d').'+ 7 days'))?>" min="<?php echo date('Y-m-d')?>" name="tanggal" />