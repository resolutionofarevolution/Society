
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Society Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

body{
font-family: 'Segoe UI', sans-serif;
background:#f5f7fa;
}

/* NAVBAR */

.navbar{
padding:15px 0;
}

/* HERO SECTION */

.hero{
height:90vh;
display:flex;
align-items:center;
background: linear-gradient(135deg,#4facfe,#00f2fe);
color:white;
}

.hero h1{
font-size:52px;
font-weight:700;
}

.hero p{
font-size:20px;
opacity:0.9;
}

.hero-buttons .btn{
padding:12px 28px;
font-size:18px;
border-radius:30px;
}

/* FEATURES */

.features{
padding:80px 0;
}

.feature-card{
background:white;
padding:40px;
border-radius:12px;
height:100%;
transition:0.3s;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

.feature-card:hover{
transform:translateY(-8px);
box-shadow:0 12px 30px rgba(0,0,0,0.15);
}

.feature-icon{
font-size:40px;
color:#4facfe;
margin-bottom:20px;
}

/* FOOTER */

footer{
background:#111;
color:white;
padding:25px;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand fw-bold" href="#">
<i class="fa-solid fa-building"></i> Society Management
</a>

<div class="ms-auto">

<a href="login\" class="btn btn-outline-light me-2">Login</a>

<a href="register\" class="btn btn-warning">Register</a>

</div>

</div>

</nav>

<!-- HERO -->

<section class="hero">

<div class="container text-center">

<h1>Smart Society Management System</h1>

<p class="mt-3">
Manage Residents, Complaints and Visitors Efficiently
</p>

<div class="hero-buttons mt-4">

<a href="login\" class="btn btn-light me-3">
<i class="fa-solid fa-right-to-bracket"></i> Login
</a>

<a href="register\" class="btn btn-dark">
<i class="fa-solid fa-user-plus"></i> Register
</a>

</div>

</div>

</section>

<!-- FEATURES -->

<section class="features">

<div class="container">

<h2 class="text-center mb-5">System Features</h2>

<div class="row g-4">

<div class="col-md-4">

<div class="feature-card text-center">

<div class="feature-icon">
<i class="fa-solid fa-users"></i>
</div>

<h4>Resident Management</h4>

<p>
Manage resident details, flat numbers and society records easily through a centralized system.
</p>

</div>

</div>

<div class="col-md-4">

<div class="feature-card text-center">

<div class="feature-icon">
<i class="fa-solid fa-triangle-exclamation"></i>
</div>

<h4>Complaint System</h4>

<p>
Residents can raise complaints and administrators can monitor and resolve them efficiently.
</p>

</div>

</div>

<div class="col-md-4">

<div class="feature-card text-center">

<div class="feature-icon">
<i class="fa-solid fa-user-shield"></i>
</div>

<h4>Visitor Tracking</h4>

<p>
Security guards can track visitor entries and exits ensuring safety of the society.
</p>

</div>

</div>

</div>

</div>

</section>

<!-- FOOTER -->

<footer class="text-center">

Society Management System • BSc IT Project

</footer>

</body>
</html>