<?php include 'header.php';

 ?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1>PLAY BOLD</h1>
            <p>Join the Royal Challengers journey as we aim for glory in the upcoming cricket season</p>
            <div class="hero-buttons">
                <a href="<?php echo isset($_SESSION['user_id']) ? 'tickets.php' : 'login.php'; ?>" class="btn btn-primary">Buy Tickets</a>
                <a href="<?php echo isset($_SESSION['user_id']) ? 'team.php' : 'login.php'; ?>" class="btn btn-outline-light">Team Roster</a>
            </div>
        </div>
    </section>
    <!-- Team Highlights -->
    <section class="section team-highlights">
        <div class="container">
            <h2 class="section-title">Team Highlights</h2>
            <div class="highlights-grid">
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Championship History</h3>
                    <p>Explore our journey through the years and the memorable moments that defined our legacy.</p>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Star Players</h3>
                    <p>Meet the champions who represent our colors and bring their exceptional talent to the field.</p>
                </div>
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <h3>Season Schedule</h3>
                    <p>Stay updated with our complete match schedule and never miss a moment of the action.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="section latest-news" id="latest-news">
        <div class="container">
            <div class="section-header">
                <h2>Latest News</h2>
                <a href="news.php" class="view-all">View All <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="news-grid">
                <?php
        let matchesShown = false;

        toggleButton.addEventListener('click', function () {
            if (!matchesShown) {
                // Append additional matches to the match grid
                additionalMatches.forEach(match => {
                    const matchCard = document.createElement('div');
                    matchCard.className = 'match-card';
                    matchCard.innerHTML = `
                        <div class="match-header">
                            <span>${match.league}</span>
                            <span>Match #${match.match_num}</span>
                        </div>
                        <div class="match-content">
                            <div class="teams">
                                <div class="team">
                                    <span>${match.team1}</span>
                                </div>
                                <span class="vs">VS</span>
                                <div class="team">
                                    <span>${match.team2}</span>
                                </div>
                            </div>
                            <div class="match-details">
                                <div class="detail">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>${match.date} | ${match.time}</span>
                                </div>
                                <div class="detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>${match.venue}</span>
                                </div>
                            </div>
                            <a href="<?php echo isset($_SESSION['user_id']) ? 'tickets.php' : 'login.php'; ?>" class="btn btn-primary btn-block">Buy Tickets</a>
                        </div>
                    `;
                    matchGrid.appendChild(matchCard);
                });

                // Update button text and state
                toggleButton.innerHTML = 'View Less <i class="fas fa-chevron-up"></i>';
                matchesShown = true;
            } else {
                // Remove additional matches from the match grid
                const additionalMatchCards = Array.from(matchGrid.children).slice(3); // Keep the first 3 matches
                additionalMatchCards.forEach(card => card.remove());

                // Update button text and state
                toggleButton.innerHTML = 'View All <i class="fas fa-chevron-right"></i>';
                matchesShown = false;
            }
        });
    });
</script>