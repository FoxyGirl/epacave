/* получить список из всех категорий */
SELECT * FROM categories;

/* получить самые новые, открытые лоты.
Каждый лот должен включать название, стартовую цену,
ссылку на изображение, цену, количество ставок, название категории; */
SELECT
  lots.id,
  lots.lot_name,
  lots.start_price,
  lots.img_path,
  MAX(bets.bet) AS current_price,
  COUNT(bets.lot_id) AS count_bets,
  categories.name AS category
  FROM lots
  LEFT JOIN bets
    ON bets.lot_id = lots.id
  JOIN categories
    ON categories.id = lots.category_id
  WHERE lots.winner_user_id IS NULL
  GROUP BY lots.id
;


/* найти лот по его названию или описанию */
SELECT * FROM lots
  WHERE lots.lot_name LIKE ?
  OR lots.description LIKE ?
;

/* добавить новый лот (все данные из формы добавления); */
INSERT INTO lots (
  lot_name,
  user_id,
  dt_add,
  description,
  img_path,
  start_price,
  dt_close,
  step_bet,
  category_id
) VALUES (?,?,?,?,?,?,?,?,?)
;

/* обновить название лота по его идентификатору; */
UPDATE lots SET
  lot_name = ?
  WHERE id = ?
;

/* добавить новую ставку для лота; */
INSERT INTO bets (dt_add, bet, user_id, lot_id)
    VALUES (?,?,?,?)
;

/* получить список ставок для лота по его идентификатору */
SELECT
  bets.id,
  bets.bet,
  bets.dt_add,
  bets.lot_id,
  bets.user_id
  FROM bets
  JOIN lots
    ON bets.lot_id = lots.id
  WHERE lots.id = 1
;