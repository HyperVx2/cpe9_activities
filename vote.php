<?php
    session_start();
    if(isset($_SESSION['name']) || isset($_POST['submit-btn'])) {
        $name = $_SESSION['name'];
        $username = $_SESSION['userID'];

    
    require 'includes/database.php';
    // Retrieve program information for the student
    $sql = "SELECT SUBSTRING_INDEX(program, '-', 1) AS program FROM voting_system.users WHERE username = ?";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        header("Location: ../vote.php?error=sqlerror");
        exit();
    } else {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($program);
        $stmt->fetch();
        $stmt->close();
    }

    // Retrieve Candidates for President and Vice President
    $sql = "SELECT id, name, position, party FROM voting_system.candidates WHERE program IS NULL AND (position = 'president' OR position = 'vpresident')";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        header("Location: ../vote.php?error=sqlerror");
        exit();
    } else {
        $stmt->execute();
        $result = $stmt->get_result();
        $presidentCandidates = array();
        $vicePresidentCandidates = array();
        while ($row = $result->fetch_assoc()) {
            if ($row['position'] === 'president') {
                $presidentCandidates[] = $row;
            } elseif ($row['position'] === 'vpresident') {
                $vicePresidentCandidates[] = $row;
            }
        }
        $stmt->close();
    }

    // Retrieve Candidates for Representatives
    $sql = "SELECT id, name, party FROM voting_system.candidates WHERE program = ?";
    $stmt = $conn->stmt_init();
    if (!$stmt->prepare($sql)) {
        header("Location: ../vote.php?error=sqlerror");
        exit();
    } else {
        $stmt->bind_param("s", $program);
        $stmt->execute();
        $result = $stmt->get_result();
        $representativeCandidates = array();
        while ($row = $result->fetch_assoc()) {
            $representativeCandidates[] = $row;
        }
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="css/vote.css">
    <title>Voting Page</title>
</head>
<body class="text-center">
    <div class="container-fluid py-4" id="top">
        <div class="row mx-3 bg-white px-2 shadow my-auto" id="body">
            <div class="dropleft">
                <img class="img-profile rounded-circle dropdown-toggle" src="images/avatar.png" width=45 id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <a class="dropdown-item" href="results.php">
                        <i class="fad fa-poll-h fa-fw mr-2 text-muted"></i>Live Results
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="includes/user_logout.inc.php">
                        <i class="fad fa-sign-out-alt fa-fw mr-2 text-muted"></i>Logout
                    </a>
                </div>
            </div>
            <h1 class="mt-3 mb-3 font-weight-300">Welcome to the SSU USC Elections 2023, <?php echo $name; ?>!</h1>
            <hr class="mx-auto">
            <?php
                if(isset($_GET['success'])) {
            ?>
            <div class="row">
                <div class="col-6 my-auto">
                    <img src="images/undraw_voting_nvu7.png" alt="voted" class="img-fluid">
                </div>
                <div class="col-6 my-auto py-10">
                    <h1 class="font-weight-300" style="line-height: 1.5;">Congratulations!</h1>
                    <h1 class="mb-3 font-weight-300" style="line-height: 1.5;">Your vote has been casted. Thank you for cooperating.</h1>
                    <div class="row text-center">
                        <a href="includes/user_logout.inc.php" class="col-4 mt-2 btn btn-danger px-4 mr-2 ml-auto">Logout</a>
                        <a href="results.php" class="col-4 mt-2 btn btn-blue px-4 ml-2 mr-auto">Result Page</a>
                    </div>
                </div>
            </div>
            <?php
                }
                else {
                    require 'includes/database.php';
                    $sql = "SELECT firstName, username, voted FROM voting_system.users WHERE firstName=? AND username=? AND voted=0";
                    $stmt = $conn -> stmt_init();
                    if($stmt -> prepare($sql)) {
                        $stmt -> bind_param("ss", $name, $username);
                        $stmt -> execute();
                        $stmt -> store_result();
                        $resultCheck = $stmt -> num_rows();
                        if($resultCheck > 0) {
            ?>
            <form class="form-signin text-center mx-auto" action="includes/vote.inc.php" method="POST">

            <div class="form-check">
                <h2 for="inputPresident">President</h2>
                <?php foreach ($presidentCandidates as $candidate) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="president" id="<?php echo $candidate['name']; ?>" value="<?php echo $candidate['id']; ?>">
                        <label class="form-check-label" for="<?php echo $candidate['name']; ?>">
                            <?php echo $candidate['name'] . ' (' . $candidate['party'] . ')'; ?>
                        </label>
                    </div>
                <?php } ?>
            </div>

            <div class="form-check">
                <h2 for="inputVicePresident">Vice-President</h2>
                <?php foreach ($vicePresidentCandidates as $candidate) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vice-president" id="<?php echo $candidate['name']; ?>" value="<?php echo $candidate['id']; ?>">
                        <label class="form-check-label" for="<?php echo $candidate['name']; ?>">
                            <?php echo $candidate['name'] . ' (' . $candidate['party'] . ')'; ?>
                        </label>
                    </div>
                <?php } ?>
            </div>

            <div class="form-group">
                <h2 for="inputRepresentative">Representatives (select up to 5)</h2>
                <?php foreach ($representativeCandidates as $candidate) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="representatives[]" id="<?php echo $candidate['name']; ?>" value="<?php echo $candidate['id']; ?>">
                        <label class="form-check-label" for="<?php echo $candidate['name']; ?>">
                            <?php echo $candidate['name'] . ' (' . $candidate['party'] . ')'; ?>
                        </label>
                    </div>
                <?php } ?>
            </div>

                <section id="submit" class="mb-3 mt-5">
                    <div class="form-check my-auto text-center">
                        <input class="form-check-input" type="checkbox" id="inlineFormCheck" required>
                        <label class="form-check-label ml-1" for="inlineFormCheck">I have reviewed my votes and ready to cast it</label>
                    </div>
                    <button class="mt-3 btn btn-blue px-4 mx-auto" type="submit" name="submit-btn">Cast Vote</button>
                </section>
            </form>
            <?php
                        }
                        else {
            ?>
            <div class="row">
                <div class="col-6 my-auto">
                    <img src="images/undraw_voting_nvu7.png" alt="voted" class="img-fluid">
                </div>
                <div class="col-6 my-auto py-10">
                    <h1 class="font-weight-300" style="line-height: 1.5;">Your vote has already been casted!</h1>
                    <h1 class="mb-3 font-weight-300" style="line-height: 1.5;">You can only vote once.</h1>
                        <div class="row text-center">
                            <a href="includes/user_logout.inc.php" class="col-4 mt-2 btn btn-danger px-4 mr-2 ml-auto">Logout</a>
                            <a href="results.php" class="col-4 mt-2 btn btn-blue px-4 ml-2 mr-auto">Result Page</a>
                        </div>
                    </div>
            </div>
            <?php
                        }
                    }
                }
            ?>
        </div>
    </div>
    
    <!-- JavaScript and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="vendor/jquery-3.5.1.min.js"></script>

    <script>
    $(document).ready(function() {
        $('input[name="representatives[]"]').on('change', function() {
            var selectedCount = $('input[name="representatives[]"]:checked').length;
            if (selectedCount > 5) {
                $(this).prop('checked', false);
            }
        });
    });
    </script>
    
</body>
</html>

<?php
    }
    else {
        header("Location: index.php");
        exit();
    }
?>