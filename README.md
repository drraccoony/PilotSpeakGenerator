[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
# PilotSpeakGenerator
A simple and straight forward phrase generatior to help me talk like pilots and fit in with the crowd.

## Phrase examples
> **The night recurrent on my check ride while based in NY was in question by my chief pilot.**

> **The crew meals on the 737 MAX during my last trip was super f^$ked up.**

> **The reserve trips on the 737 last month was against ALPA regulations.**

## How it works
Simply chooses random words from several pre-defined arrays and piecing them together using `array_rand()`. Also uses some javascript to copy text to the users clipboard via a button press. Keeps track of usage via a flat file `totalgens.txt` via  a `intval()` function.

A live version of this project can be found @ https://drraccoon.me/pilot/

## License
GNU GPLv3
