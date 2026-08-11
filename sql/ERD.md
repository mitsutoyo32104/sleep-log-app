# ER図

## 第1正規形
| user_id | user_name | password | nickname | 
| daiy_id | date | bed_time | sleep_time | wake_time | out_of_bed_time | wakeup_quality | daytime_sleepiness | 
| daily Mood | situation | emotions | automatic_thoughts | evidence For |  evidence_against | adaptive_thoughts | 
| breakfast | lunch | dinner |
|  --  |  -- | -- | -- | -- | -- | -- | -- | -- | -- | --| -- | -- |


## 第2正規化
### mst.users
| user_id | user_name | password |  nickname | 

### txn.daily テーブル
| date_id | date |  user_id | sleep_id | cbt_id | meal_id | weight |

### sleep テーブル
| sleep_id | user_id | bed_time | sleep_time | wake_time | out_of_bed_time | wakeup_quality | daytime_sleepiness | 

### txn.cbt テーブル
| cbt_id |  user_id | daily Mood | situation | emotions | automatic_thoughts | evidence For |  evidence_against | adaptive_thoughts | 

### txn.meal テーブル
| meal_id | user_id | breakfast | lunch | dinner | 

### elimination テーブル
| elimination_id | user_id |  stool_count | stool_consistency | 

### 各テーブル追加項目
|updated_at | updated_by | created_at | created_by | del_flg |




## 第3正規化
### mst.users: ユーザーマスタ
| user_id | user_name | password |  nickname | 
| INT AUTO_INCRMENT |  VARCHAR(20) | VARCHAR(20) | VARCHAR(20) | 
| PK  |  NOT NULL UNIQUE  | NOT NULL  | NOT NULL |

### txn_emotion_types  : 感情カテゴリマスタ : 複数選択可のためわける
| emotions_id | user_id | emotion_types |  INTENSITY |is_default |
| INT         |   INT   |  VARCHAR      |    INT     | BOOLEAN  |
| PK          |   FK   |

### txn.daily： 日次総合テーブル：
| date_id |  user_id | date |  sleep_id | cbt_id | meal_id | weight |
| INT     |  INT     | DATETIME |   INT   | INT    | INT     | FLOAT |
|  PK     |  FK      |      |   FK      |   FK   |   FK     |        |

### txn.sleep： 睡眠記録テーブルテーブル
| sleep_id | user_id | bed_time | sleep_time | wake_time | out_of_bed_time |  wakeup_quality | daytime_sleepiness | afternoon_sleepness | 
| INT     |    INT   |   DATETIME   |  DATETIME | DATETIME | DATETIME | INT |   INT            | INT            | INT                | INT                 |


### txn.cbt テーブル  CBT記録テーブル(1~5)
| cbt_id |  user_id | daily Mood | situation    | emotion_id |   automatic_thoughts | evidence For |  evidence_against | adaptive_thoughts | 
|  INT   |   INT    |    INT     | VARCHAR(255) | INT        |   INT(2)   |  TEXT          |  TEXT       |      TEXT         |       TEXT        | 
|   PK   |   FK     |                           |   FK       |             |

### txn.meal テーブル ：食事記録テーブル
| meal_id | user_id | breakfast | lunch | dinner | 
| INT     |  INT    |   INT     |    INT |  INT  |
|   PK    |   FK    |


### mst.elimination テーブル(1~5)
| elimination_id | user_id |  stool_count | stool_consistency | 
| INT            |   INT   |   INT        |    INT            |
|   PK           |   FK    |

### 各テーブル追加項目：排泄記録テーブル
|updated_at | updated_by | created_at | created_by | del_flg |