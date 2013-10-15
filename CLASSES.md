#StaffsLAN Class Drafting

## Core

### LAN
lan_id _integer_

lan_start _datetime_

lan_end _datetime_

lan_title _string_

lan_description _string_


### User
user_id _integer_

user_type _string_

## Physical Management

### Room
room_id _integer_

room_name _string_

lan_id _integer_

### Block
block_id _integer_

block_name _string_

room_id _integer_

block_shorthand _string_

### Seat
seat_id _integer_

block_id _integer_

seat_num _string_

### Item
item_id _integer_

block_id _integer_

item_description _string_

## Surveys

### Survey
survey_id _integer_

survey_title _string_

lan_id _integer_

### Question
question_id _integer_

survey_id _integer_

text _string_

type _string_

data _string_

### Answer
question_id _integer_

user_id _integer_

value _string_

## Tournaments

### Tournament
tournament_id _integer_

game_id _integer_

schedule_item_id _integer_

tournament_title _string_

tournament_description _string_

bb_id _integer_

lan_id _integer_

### Schedule Item
schedule_item_id _integer_

schedule_name _stirng_

schedule_description _string_

schedule_start _datetime_

schedule_end _datetime_

### Team
team_id _integer_

name _string_

tournament_id _integer_

### Prize
prize_id _integer_

tournament_id _integer_

prize_title _string_

prize_place _integer_

## Games

### Game
game_id _integer_

game_title _string_

game_image _string_

steam_appid _integer_

### Server
server_id _integer_

server_title _string_

server_host _string_

server_port _integer_

server_type _string_

lan_id _integer_

## Misc.

### SignInOut
inout_id _integer_

user_id _integer_

inout_time _datetime_

lan_id _integer_

### CallForHelp
cfh_id _integer_

cfh_message _string_

cfh_user_id _integer_