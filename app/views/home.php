<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Home View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website tester for custom php lite framework.">
    <meta name="author" content="S.Mishevski">
    <link rel="stylesheet" href="./../../../public/css/app.css">
  </head>

  <body>
    <div class="main-container">
      <h1>HOME LAYOUT ROOT</h1>
      <?php if (isset($items)): ?>
        <?php foreach($items as $item): ?>
          <div class="post-container">
            <h2 class="post-title"> <?=$item ?> </h2>
            <p class="post-description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nunc arcu, condimentum ac facilisis et, porta sit amet purus. Donec imperdiet luctus luctus. Proin aliquam, ipsum id ullamcorper tincidunt, nunc augue luctus mauris, sed rhoncus odio arcu sed nisl. Duis nec sagittis ante. Nulla facilisi. Mauris laoreet neque sit amet mollis facilisis. Nunc nec erat volutpat, placerat massa ut, commodo ipsum. Vivamus blandit erat ac mauris vulputate, nec molestie risus rutrum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus malesuada est et leo congue tempor.
            </p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div>
          <h2>ERROR: NO ITEMS WERE FOUND!</h2>
        </div>
      <?php endif; ?>
    </div>
  </body>
  </html>
