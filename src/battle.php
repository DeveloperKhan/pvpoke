<?php 

$META_TITLE = 'Battle';

$META_DESCRIPTION = 'Pit two custom Pokemon against each other in the Trainer Battle simulator. You can choose from any league, and customize movesets, levels, IV\'s, and shields.';

$CANONICAL = '/battle/';

if(isset($_GET['p1']) && (isset($_GET['p2']))){
	// Put Pokemon names in the meta title
	
	$name1 = ucwords(str_replace('_',' ',htmlspecialchars($_GET['p1'])));
	$name2 = ucwords(str_replace('_',' ',htmlspecialchars($_GET['p2'])));
	
	$META_TITLE = 'Battle - ' . $name1 . ' vs. ' . $name2;
}

require_once 'header.php';

?>

<h1>Battle</h1>

<div class="section league-select-container white">
	<?php require 'modules/leagueselect.php'; ?>
	<select class="mode-select">
		<option value="single">Single Battle</option>
		<option value="multi">Multi Battle</option>
	</select>
	<p class="description single">Select two Pokemon from any league to fight a simulated battle. Customize movesets, levels, IV's, and shields.</p>
	<p class="description multi hide">Battle one Pokemon against an entire league or cup. Explore overall performance or individual matchups.</p>
</div>

<div class="section poke-select-container single">
	<?php require 'modules/pokeselect.php'; ?>
	<?php require 'modules/pokeselect.php'; ?>
	<?php require 'modules/pokemultiselect.php'; ?>
	<div class="clear"></div>
</div>

<div class="section battle">
	<button class="battle-btn button">Battle</button>
	<div class="tooltip"><h3 class="name"></h3><div class="details"></div></div>
	
	<div class="battle-results single">
		<div class="sandbox-btn-container">
			<div class="sandbox-btn" title="Manually edit the timeline">
				<span>Sandbox Mode</span>
				<div class="btn-background"></div>
			</div>
			<div class="sandbox clear-btn" title="Clear Timeline"></div>
		</div>
		<div class="clear"></div>
		
		<div class="timeline-container scale">
			<div class="timeline"></div>
			<div class="timeline"></div>
			<div class="tracker"></div>
		</div>
		<div class="tip automated">Hover over or tap the timeline for details</div>
		<div class="tip sandbox">Click or tap the timeline events to edit actions</div>
		<div class="playback section white">
			<div class="flex">
				<div class="playback-btn replay"></div>
				<div class="playback-btn play"></div>
				<select class="playback-speed">
					<option value="1">1x speed*</option>
					<option value="4">4x speed</option>
					<option value="8" selected >8x speed</option>
					<option value="16">16x speed</option>
				</select>
				<select class="playback-scale">
					<option value="fit" selected>Scale to fit</option>
					<option value="zoom">Zoom in</option>
				</select>
			</div>
			<div class="disclaimer">* Results may differ from actual gameplay depending on connectivity, device, player decisions, or other factors.</div>
		</div>
		<div class="summary section white"></div>
		
		<div class="share-link-container">
			<p>Share this battle:</p>
			<div class="share-link">
				<input type="text" value="" readonly>
				<div class="copy">Copy</div>
			</div>
		</div>
		
		<div class="section white battle-details">
			<a class="toggle active" href="#">Matchup Details <span class="arrow-down">&#9660;</span><span class="arrow-up">&#9650;</span></a>
			
			<div class="toggle-content active">
				<div class="matchup-detail-section">
					<h2 class="center"><span class="name-1">Pokemon</span>'s Matchups vs. <span class="name-2">Pokemon</span></h2>
					<table class="rating-table" cellspacing="0">
						<tr>
							<td></td>
							<td></td>
							<td colspan="3"><span class="name name-2">Pokemon</span></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><span class="shield shield-none"></span></td>
							<td><span class="shield"></span></td>
							<td><span class="shield shield-double"></span></td>
						</tr>
						<tr>
							<td rowspan="3"><span class="name name-1">Pokemon</span></td>
							<td><span class="shield shield-none"></span></td>
							<td><a href="#" class="rating star battle-0-0" shields="0,0">100</a></td>
							<td><a href="#" class="rating star battle-1-0" shields="1,0">100</a></td>
							<td><a href="#" class="rating star battle-2-0" shields="2,0">100</a></td>
						</tr>
						<tr>
							<td><span class="shield"></span></td>
							<td><a href="#" class="rating star battle-0-1" shields="0,1">100</a></td>
							<td><a href="#" class="rating star battle-1-1" shields="1,1">100</a></td>
							<td><a href="#" class="rating star battle-2-1" shields="2,1">100</a></td>
						</tr>
						<tr>
							<td><span class="shield shield-double"></td>
							<td><a href="#" class="rating star battle-0-2" shields="0,2">100</a></td>
							<td><a href="#" class="rating star battle-1-2" shields="1,2">100</a></td>
							<td><a href="#" class="rating star battle-2-2" shields="2,2">100</a></td>
						</tr>
					</table>
					<p class="center">Click or tap to view battles.</p>
				</div>
				
				<h2 class="center">Battle Stats</h2>
				
				<table class="stats-table" cellspacing="0">
					<tr>
						<td></td>
						<td><span class="name name-1">Pokemon</span></td>
						<td><span class="name name-2">Pokemon</span></td>
					</tr>
					<tr>
						<td class="label">Battle Rating</td>
						<td class="stat-battle-rating"><span class="rating star">100</span></td>
						<td class="stat-battle-rating"><span class="rating star">100</span></td>
					</tr>
					<tr>
						<td class="label">Total Damage</td>
						<td class="stat-total-damage">100</td>
						<td class="stat-total-damage">100</td>
					</tr>
					<tr>
						<td class="label">Fast Move Damage</td>
						<td class="stat-fast-damage">100</td>
						<td class="stat-fast-damage">100</td>
					</tr>
					<tr>
						<td class="label">Charged Move Damage</td>
						<td class="stat-charged-damage">100</td>
						<td class="stat-charged-damage">100</td>
					</tr>
					<tr>
						<td class="label">Damage Blocked</td>
						<td class="stat-damage-blocked">100</td>
						<td class="stat-damage-blocked">100</td>
					</tr>
					<tr>
						<td class="label">Turns to First Charged Move</td>
						<td class="stat-charged-time">-</td>
						<td class="stat-charged-time">-</td>
					</tr>
					<tr>
						<td class="label">Energy Gained</td>
						<td class="stat-energy-gained">-</td>
						<td class="stat-energy-gained">-</td>
					</tr>
					<tr>
						<td class="label">Energy Used</td>
						<td class="stat-energy-used">-</td>
						<td class="stat-energy-used">-</td>
					</tr>
					<tr>
						<td class="label">Energy Remaining</td>
						<td class="stat-energy-remaining">-</td>
						<td class="stat-energy-remaining">-</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="section about white">
			<a class="toggle" href="#">About the Battle Simulator <span class="arrow-down">&#9660;</span><span class="arrow-up">&#9650;</span></a>
			<div class="toggle-content">
				<p>Can Pokemon A beat Pokemon B, and by how much? The battle simulator seeks to calculate and illustrate the answer to that question. It displays a timeline of what each Pokemon does, and how much damage they deal. While the simulator strives to paint as accurate a picture as possible, note that various factors may affect the outcome of an actual battle, such as Pokemon stats, latency, device performance, and human decision-making. We hope the simulator can serve as a helpful guide for real-world battles.</p>
				<p>Below are details for how the battle simulator works.</p>
				<h2>Battle Rating</h2>
				<p>Battle Rating</a> is a metric used to represent each battle's outcome. It is the backbone of PvPoke's rankings. The Battle Rating formula is:</p>
				<p class="center"><span class="rating star">Battle Rating</span> = (500 x (Damage Dealt / Opponent's HP)) + (500 x (HP Remaining / HP))</p>
				<p>In other words, a Pokemon gets up to 500 points for the percentage of HP it damages in battle and up to 500 points for the percentage of HP it survives with. Battle Rating has a hypothetical maximum of 1000 (victory with no damage taken) and a hypothetical minimum of 0 (loss with no damage dealt). Victories will always have a minimum Battle Rating of 500</p>
				<p>Battle Rating is a way of measuring battles beyond simply "win" and "loss"; it may be valuable to know not only which Pokemon can win, but which can do so while sustaining the least amount of damage, leaving them in a better position for the next fight.</p>
				<h2>Pokemon Stats</h2>
				<p>A Pokemon's actual stats are a result of its base stats, IV's, and a CP multiplier (determined by level). The stats shown are a Pokemon's actual stats at the given CP or level. "Overall" is a product of the three stats and gives a general idea for performance, mostly useful for comparing Pokemon of the same or similar species.</p>
				<p>By default, Pokemon have IV's of 0 and are automatically scaled to meet the exact CP by solving for CP multiplier. If a Pokemon can't reach the CP limit at level 40, its IV's are incremented by 1 until it does reach the CP limit or until it has IV's of 15. This process results in Pokemon having a level/CP multiplier that isn't usually attainable. However, it best represents each Pokemon's natural ability with no other factors involved.</p>
				<h2>Move Selection</h2>
				<p>When using the auto select option, the simulator calculates which moves would be optimal in the current matchup. It does this in the steps below:</p>
				<ol>
					<li>Sort Charged Moves by DPE (damage per energy) and select the best move for the "Main" Charged Move. Some Charged Moves deal a lot of damage but take longer to charge, while others charge quickly but deal less damage. DPE helps determine each Pokemon's most efficient move in the matchup.</li>
					<li>Sort remaining Charged Moves by damage per energy squared and select the best move for the "Secondary" Charged Move. Since this weighs moves by energy, fast-charging moves are more likely to be selected than slow ones. This method for selecting a Secondary Charged Move was chosen because the battle algorithm prioritizes fast Charged Moves over the Main Charged Move in certain scenarios, so this helps give Pokemon access to their faster attacks even if they aren't as efficient on paper as other options (e.g. Dragonite with Dragon Claw or Magneton with Discharge).</li>
					<li>Calculate TDO (total damage output) for each Fast Move and select the best option. TDO is simply the product of DPS (how much damage a Pokemon deals per second, on average) and how much time the Pokemon lasts in battle.</li>
				</ol>
				<p>While this algorithm does its best to give each Pokemon the optimal result in battle, it does currently have a few pitfalls. First, TDO calculations don't take into account things like shields, or how many Charged Moves a Pokemon is actually able to use in its lifetime. This means a Pokemon may perform slightly better with a different Fast Move if shields are in play or if it faints before a certain threshold. Second, there may be edge cases where a certain move combination produces a better result than the one automatically selected due to damage hitting at specific times and in specific intervals. Know that auto selection will give you the best result the majority of the time, but don't be afraid to experiment with movesets for each matchup.</p>
				<p>You can customize moves at any time. Pokemon are given two Charged Moves by default, but you can set this to "None" if you want, or even remove both Charged Moves if you want to see how a Pokemon performs with only its Fast Move.</p>
				<h2>Battle Algorithm</h2>
				<p>Pokemon GO's Trainer Battles take place in 0.5-second "turns", and the simulator increments through each of those turns while determining the best possible action for both combatants. To determine those actions, the simulator performs the following checks:</p>
				<ol>
					<li>If the Main Charged Move is available, use it immediately.</li>
					<li>Use the Secondary Charged Move if:
						<ul>
							<li>It would KO the opponent</li>
							<li>The opponent has a shield</li>
							<li>The opponent's next action would result in a KO</li>
						</ul>
					</li>
					<li>If the opponent is using any Charged Move and shields are available, block it.</li>
					<li>If none of these are true, use the Fast Move.</li>
				</ol>
				<p>This algorithm produces the following behavior:</p>
				<ol>
					<li>Pokemon will use any move available if it would result in a KO.</li>
					<li>Pokemon will use any move available to deal the most possible damage before they feint.</li>
					<li>Pokemon will always shield themselves if possible.</li>
					<li>Pokemon will use their fastest Charged Move to remove an opponent's shields.</li>
				</ol>
				<p>This behavior may not always represent human play or strategies, but it's intended to give each Pokemon the best result in the specific battle.</p>
				<h2>Simultaneous Actions &amp; Knockouts</h2>
				<p>One nuance of Pokemon GO Trainer Battles is that actions occur simultaneously. Because of this, the battle simulator allows both Pokemon to take their action each turn even if one is technically fainted. Without this caveat, the first Pokemon in a simulated battle would have a distinct advantage simply because its moves are processed first.</p>
				<p>This can result in a battle simulation where two Pokemon knock each other out simultaneously. In these scenarios, bear in mind that the outcome of an actual battle may vary and, in the case of simultaneous Charged Moves, is heavily dependent on which goes first.</p>
			</div>
		</div>
		
	</div>
	
		
	<div class="section white battle-results multi">
		<a class="toggle active" href="#">Overall Results <span class="arrow-down">&#9660;</span><span class="arrow-up">&#9650;</span></a>

		<div class="toggle-content">

			<p>The histogram below shows how many winning and losing matchups your Pokemon has. You can see previous results to compare Pokemon, movesets, or shield scenarios.</p>
		
			<div class="histograms">
				<div class="histogram"></div>
			</div>
		</div>
	</div>
	
	<div class="section white battle-results multi">
		<a class="toggle active" href="#">Individual Matchups <span class="arrow-down">&#9660;</span><span class="arrow-up">&#9650;</span></a>

		<div class="toggle-content">
			<input class="poke-search" context="ranking-search" type="text" placeholder="Search Pokemon Name or Type" />
			<div class="ranking-header">Opponent</div>
			<div class="ranking-header right">Battle Rating</div>
			<div class="rankings-container clear"></div>
			<div class="button download-csv">Export to CSV</div>
		</div>
	</div>
	
	<div class="battle-results multi">
		<div class="share-link-container">
			<p>Share this battle:</p>
			<div class="share-link">
				<input type="text" value="" readonly>
				<div class="copy">Copy</div>
			</div>
		</div>
	</div>
</div>

<!--Sandbox forms-->

<div class="sandbox-move-select hide">
	<select class="move-select"></select>
	
	<div class="move-stats flex">
		<div class="stat-dmg"><span class="stat"></span> damage</div>
		<div class="stat-energy"><span class="stat"></span> energy</div>
		<div class="stat-duration fast"><span class="stat"></span> turn(s)</div>
		<div class="stat-dpt fast"><span class="stat"></span> dpt</div>
		<div class="stat-ept fast"><span class="stat"></span> ept</div>
		<div class="stat-dpe charged"><span class="stat"></span> dpe</div>
	</div>
	
	<div class="check shields charged"><span></span>Shield this attack</div>
	<div class="check buffs charged"><span></span>Apply buffs/debuffs</div>
	
	<div class="center">
		<div class="button apply">Apply Changes</div>
	</div>
</div>

<div class="sandbox-clear-confirm hide">
	<p>Clear all custom actions from the timeline? This will reset the battle to Fast Moves only so you can start from a clean slate.</p>
	
	<div class="center flex">
		<div class="button yes">Yes</div>
		<div class="button no">No</div>
	</div>
</div>

<!--test-->
<script src="<?php echo $WEB_ROOT; ?>js/GameMaster.js?v=46"></script>
<script src="<?php echo $WEB_ROOT; ?>js/pokemon/Pokemon.js?v=11"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/Interface.js?v=29"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/PokeSearch.js"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/PokeSelect.js?v=20"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/PokeMultiSelect.js?=2"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/BattleHistogram.js?v=2"></script>
<script src="<?php echo $WEB_ROOT; ?>js/interface/ModalWindow.js"></script>
<script src="<?php echo $WEB_ROOT; ?>js/battle/TimelineEvent.js?v=6"></script>
<script src="<?php echo $WEB_ROOT; ?>js/battle/TimelineAction.js"></script>
<script src="<?php echo $WEB_ROOT; ?>js/battle/Battle.js?v=22"></script>
<script src="<?php echo $WEB_ROOT; ?>js/battle/TeamRanker.js?v=15"></script>
<script src="<?php echo $WEB_ROOT; ?>js/Main.js?v=3"></script>

<?php require_once 'footer.php'; ?>