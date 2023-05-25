<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="css/results.css">
    <title>Voting Results</title>
</head>
<body>
    <div class="container-fluid py-4" id="top">
        <div class="row mx-3 bg-white px-5 shadow" id="body">
            <div class="row">
                <div class="col-12 my-auto">
                    <h1 class="text-center mt-3 mb-3 font-weight-300">USC 2023 Election: Live Results</h1>
                </div>
                <?php
                    if(isset($_SESSION['name'])) {
                        echo '<div class="col-1 my-auto">
                                <a href="includes/user_logout.inc.php" class="btn btn-danger">Logout</a>
                            </div>
                            <div class="col-11 my-auto">
                                <h1 class="text-center mt-3 mb-3 font-weight-300">USC 2023 Election: Live Results</h1>
                            </div>';
                    }
                ?>
            </div>
            <hr class="mx-auto">
            <h2 id="count" class="text-center"></h2>
            <section id="president" class="mt-3">
                <h2 class="text-center">President and Vice President</h2>
                <hr class="mx-auto separator">
                <div class="row">
                    <?php
                        $apiData = json_decode(file_get_contents('http://localhost/cpe9_activities/api/'), true);
                        $votesData = $apiData['votes'];
                        $candidatesData = $apiData['candidates'];

                        $presidentCandidates = array_filter($candidatesData, function($candidate) {
                            return $candidate['position'] === 'president';
                        });

                        $vpresidentCandidates = array_filter($candidatesData, function($candidate) {
                            return $candidate['position'] === 'vpresident';
                        });

                        function getCandidateVotes($candidateId, $votesData) {
                            $candidateVotes = array_filter($votesData, function($vote) use ($candidateId) {
                                return $vote['president'] === $candidateId || $vote['vpresident'] === $candidateId;
                            });

                            return count($candidateVotes);
                        }

                        foreach ($presidentCandidates as $presidentCandidate) {
                            $presidentCandidateId = $presidentCandidate['id'];
                            $presidentCandidateVotes = getCandidateVotes($presidentCandidateId, $votesData);

                            echo '<div class="col-6 mt-3">
                                    <h3>' . $presidentCandidate['name'] . ' - ' . $presidentCandidate['party'] . '</h3>
                                    <p>Total Votes: ' . $presidentCandidateVotes . '</p>
                                </div>';
                        }

                        foreach ($vpresidentCandidates as $vpresidentCandidate) {
                            $vpresidentCandidateId = $vpresidentCandidate['id'];
                            $vpresidentCandidateVotes = getCandidateVotes($vpresidentCandidateId, $votesData);

                            echo '<div class="col-6 mt-3">
                                    <h3>' . $vpresidentCandidate['name'] . ' - ' . $vpresidentCandidate['party'] . '</h3>
                                    <p>Total Votes: ' . $vpresidentCandidateVotes . '</p>
                                </div>';
                        }
                    ?>
                </div>
            </section>
            <hr class="mx-auto separator">
            <section id="representative" class="mt-3">
                <h2 class="text-center">Representative Candidates</h2>
                <hr class="mx-auto separator">
                <div class="row">
                    <?php
                        $representativeCandidates = array_filter($candidatesData, function($candidate) {
                            return $candidate['position'] === 'representative';
                        });

                        $programCandidates = array();

                        foreach ($representativeCandidates as $representativeCandidate) {
                            $program = $representativeCandidate['program'];
                            if (!array_key_exists($program, $programCandidates)) {
                                $programCandidates[$program] = array();
                            }
                            $programCandidates[$program][] = $representativeCandidate;
                        }

                        foreach ($programCandidates as $program => $candidates) {
                            echo '<div class="col-6 mt-3">
                                    <h3>' . strtoupper($program) . '</h3>';
                            foreach ($candidates as $candidate) {
                                $candidateId = $candidate['id'];
                                $candidateVotes = array_filter($votesData, function ($vote) use ($candidateId) {
                                    return in_array($candidateId, explode(',', $vote['rep']));
                                });

                                $totalVotes = count($candidateVotes);

                                echo '<div>
                                        <h4>' . $candidate['name'] . ' - ' . $candidate['party'] . '</h4>
                                        <p>Total Votes: ' . $totalVotes . '</p>
                                    </div>';
                            }
                            echo '</div>';
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    
    <script>
        setTimeout(function() {
            location.reload();
        }, 15000);
    </script>
</body>
</html>
