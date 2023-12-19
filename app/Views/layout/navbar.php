<nav class="navbar navbar-expand-lg bg-body-tertiary" style="height: 8vh;">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('/'); ?>">Supermarket</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if(session()->get('num_user')['role'] != 'admin') : ?>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/orders'); ?>">Orders</a>
          </li>
        </ul>
      </div>
    <?php else : ?>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('/branches'); ?>">Branches</a>
          </li>
        </ul>
      </div>
      <div class="d-flex justify-content-end me-3">
            <a href="<?= base_url('/register');?>" class="btn btn-primary my-2 my-sm-0" type="submit">Register Cabang</a>
      </div>
    <?php endif; ?>
    <div class="d-flex justify-content-end">
        <form class="form-inline my-2 my-lg-0" action="/logout" method="POST">
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
  </div>
</nav>