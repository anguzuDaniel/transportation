        <form method="post">

            <div>
                <label for="name">name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>

            <div>
                <label for="email">email</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>

            <div>
                <label for="location">client address</label>

                <select name="location" id="location">
                    <option value="<?= $row['location']; ?>" selected><?= $row['state_name']; ?></option>
                    <?php foreach ($addresses as $address) : ?>
                        <option value="<?= $address['id']; ?>"><?= $address['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="save"><?php echo $btnName; ?></button>
        </form>