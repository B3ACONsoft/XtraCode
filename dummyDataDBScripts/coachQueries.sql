SELECT E.enrollment_id, 
	   E.user_id, 
       E.player_id,
       E.team_id,
       E.league_id,
       E.enrollment_date,
       E.fee
FROM
    enrollment E, player P, users U
WHERE
	 (U.user_id = 4)
     	AND
     (P.user_id = U.user_id)
        AND
     (E.user_id = P.user_id)