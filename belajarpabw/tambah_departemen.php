<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>
<body>
  <h1>Sign up</h1>
  <form
    action="proses-register.php"
    method="post" id="sign-up"
  >
    <div>
      <label for="id-pegawai">ID Pegawai</label>
      <input type="text" id="id-pegawai" name="id-pegawai" />
    </div>
    <div>
      <label for="nama-depan">Nama Depan</label>
      <input type="email" id="nama-depan" name="nama-depan" />
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" />
    </div>
    <div>
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" id="password_confirmation" name="password_confirmation" />
    </div>
    <div>
      <button type="submit">Sign up</button>
  </form>
</body>
</html>