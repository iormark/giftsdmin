<?php if (!empty($gifts['gifts'])): ?>
    <?php foreach ($gifts['gifts'] as $gifts_key => $gifts_val): ?>
        <div class="gift__item">
            <div class="gift__info">
                <a><?php echo $gifts_val['name']; ?></a>
                <div>ID: <?php echo $gifts_val['product_id']; ?></div>
                <div>Обязуюсь доплатить: <?php echo $gifts_val['pledged']; ?></div>

                <div class="gift__location">
                    <?php echo $gifts_val['location']['country']['name']; ?>,
                    <?php echo $gifts_val['location']['city']['name']; ?>,
                    <?php echo $gifts_val['street']; ?>
                </div>


                <div class="gift__owner">
                    <?php foreach ($gifts_val['owner'] as $owner_key => $owner_val): ?>
                        <?php echo $owner_val; ?>
                    <?php endforeach; ?>
                </div>

                <div class="gift__status">Статус доставки: <?php echo $gifts_val['delivery_state']; ?></div>

                <div class="gift__meta">
                    <div>order_id: <?php echo $gifts_val['order_id']; ?></div>
                    <div>gift_uuid: <?php echo $gifts_val['uuid']; ?></div>
                    <div>delivery_date: <?php echo $gifts_val['delivery_date']; ?></div>
                </div>

            </div>

            <?php if ($gifts_val['delivery_state'] != 'delivered'): ?> 
                <div class="gift__action">
                    <fieldset id="gift__<?php echo $gifts_val['uuid']; ?>">
                        <legend>Работа c подарком</legend>

                        <div>
                            <?php if (empty($gifts_val['order_id'])): ?>
                                <input type="text" name="order_id" value="<?php echo $gifts_val['order_id']; ?>" placeholder="номер заказа" class="default"><br>
                                <button onclick="Gifts.save(this, '<?php echo $gifts_val['uuid']; ?>', 'order', 'post')">Сохранить</button>
                            <?php endif; ?>
                        </div>

                        <div>
                            <?php if (!empty($gifts_val['order_id'])): ?>
                                <?php if (empty($gifts_val['delivery_date'])): ?> 
                                    <input type="text" name="delivery_date" value="<?php echo $gifts_val['delivery_date']; ?>" placeholder="дата доставки" class="default"><br>
                                    <button onclick="Gifts.save(this, '<?php echo $gifts_val['uuid']; ?>', 'schedule', 'POST')">Сохранить</button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($gifts_val['delivery_date'])): ?>    
                            <input type="checkbox" name="delivery_state" value="delivery"> Подтвердить доставку
                            <button onclick="Gifts.save(this, '<?php echo $gifts_val['uuid']; ?>', 'delivery_state', 'PUT')">Сохранить</button>
                        <?php endif; ?>
                    </fieldset>
                <?php endif; ?>
            </div>
        </div>
        <hr style="clear: both">
    <?php endforeach; ?>
<?php else: ?>
    Just come back later
<?php endif; ?>