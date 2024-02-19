<header>Sign Up</header>
<form action="" method="post">
                  <div class="field input <?php if(isset($errors['username'])) echo 'error'; ?>">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" autocomplete="off"  value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';?>" />
                      <?php if(isset($errors['username'])) echo "<span class='error'>".$errors['username']."</span>"; ?>
                  </div>
      
                  <div class="field input <?php if(isset($errors['email'])) echo 'error'; ?>">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" autocomplete="off" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '';?>"/>
                      <?php if(isset($errors['email'])) echo "<span class='error'>".$errors['email']."</span>"; ?>
                  </div>
      
                  <div class="field input <?php if(isset($errors['age'])) echo 'error'; ?>">
                      <label for="age">Age</label>
                      <input type="number" name="age" id="age" autocomplete="off" value="<?php echo isset($_POST['age']) ? $_POST['age'] : '';?>"/>
                      <?php if(isset($errors['age'])) echo "<span class='error'>".$errors['age']."</span>"; ?>
                  </div>
      
                  <div class="field input <?php if(isset($errors['password'])) echo 'error'; ?>">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" autocomplete="off" />
                      <?php if(isset($errors['password'])) echo "<span class='error'>".$errors['password']."</span>"; ?>
                  </div>
      
                  <div class="field">
                      <input type="submit" class="btn" name="submit" value="Register" />
                  </div>
      
                  <div class="links">
                      Already a member? <a href="index.php">Sign In</a>
                  </div>
              </form>