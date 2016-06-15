<?php
class BowlingGame {
		public $rolls=[];
		private $currentRoll=0;

		public function roll($numPins)
		{			
			$this->rolls[$this->currentRoll] = $numPins;
			$this->currentRoll++;
		}

		public function score()
		{
			$score = 0;
			$frameIndex = 0;
			for ($frame =0; $frame < 10; $frame++ )
			{
				$frameScore=0;
				if ( $this->IsStrike($frameIndex) )
				{
					$frameScore = 10 + $this->StrikeBonus($frameIndex);
					$frameIndex++;
				}
				else
				{

					$frameScore = $this->SumOfFrame($frameIndex);
					if ($this->IsSpare($frame))
					{
						$frameScore += $this->SpareBonus($frameIndex);
					}

					$frameIndex += 2;
				}

				$score += $frameScore;
			}

			return $score;
		}

		private function sumOfFrame($frameIndex)
		{
			return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
		}

		private function spareBonus($frameIndex)
		{
			$spareBonus = $this->rolls[$frameIndex + 2];
			return $spareBonus;
		}

		private function strikeBonus($frameIndex)
		{
			$strikeBonus = $this->rolls[$frameIndex + 1]
			                  + $this->rolls[$frameIndex + 2];
			return $strikeBonus;
		}

		private function isStrike($frameIndex)
		{
			return $this->rolls[$frameIndex] == 10;
		}

		private function isSpare($frame)
		{
			return $this->rolls[$frame] + $this->rolls[$frame + 1] == 10;
		}
}

//class BowlingGame {
//
//    public $rolls = [];
//
//    public function roll($pins) {
//        $this->rolls[] = $pins;
//        $prev = count($this->rolls) - 2;
//        $lines = array_count_values($this->rolls);
//        
//        if(isset($lines['|']) && $lines['|'] == 9) {
//            return;
//        }
//        
//        if ($pins == 10) {
//            $this->rolls[] = '|';       //jesli 10 to dodajemy kreske do tablicy wynikow
//            return;                     // i konczymy
//        }
//
//        if ($prev >= 0 && $this->rolls[$prev] !== '|') {
//            $this->rolls[] = '|';
//        }
//    }
//
//    public function score() {
//        $score = 0;
//        $frames  = array_count_values($this->rolls);
//
//        foreach ($this->rolls as $key => $pins) {
//
//            if ($pins !== '|') {
//                $score += $pins;
//                
//                
//                if ($pins == 10 && (($key === 0 || $this->rolls[$key - 1] === '|') || $frames['|'] == 9)) {
//                    $next_val = 0;
//                    $next = $key + 1;
//                    if (isset($this->rolls[$next])) {
//                        $next_val = $this->rolls[$next];
//                    }
//
//                    $next2_val = 0;
//                    $next2 = $key + 2;
//                    if (isset($this->rolls[$next2])) {
//                        $next2_val = $this->rolls[$next2];
//                    }
//
//                    if ($next_val == '|' && isset($this->rolls[$next +1])) {
//                        $next_val = $this->rolls[$next + 1];
//                        $next2_val = $this->rolls[$next2 + 1];
//                    }
//                    if ($next2_val == '|' && isset($this->rolls[$next2 + 2])) {
//                        $next2_val = $this->rolls[$next2 + 2];
//                    }
//
//                    $score += $next_val + $next2_val;
//                } elseif ($key > 0) {
//                    if ($this->rolls[$key - 1] !== '|' && $this->rolls[$key - 1] + $this->rolls[$key] === 10) {
//                        $score += $this->rolls[$key + 2];   //[$key + 2] zeby pominac kreske
//                    }
//                } 
//            }
//        }
//        return $score;
//    }
//    
//    public function getFrames() {
//        $lines = array_count_values($this->rolls);
//        print_r($lines);
//        
//        if(isset($lines['|'])) {
//            return $lines['|'];
//        }
//        return 0;
//    }
//
//}
