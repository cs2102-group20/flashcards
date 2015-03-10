--Need to insert code for getting the values wanted

--creating new set of cards
insert into card_set(title, description, language_1, language_2, user_id) 
  values ();
  
--adding card to set
insert into card(word, translation, set_id)
  values();
  
--creating new user
insert into user
  values(,,'FALSE');
  
--adding set to favorites /collection
insert into favorite
  values();
  
--searching for sets(is one query needed for every combination?)
select title as Title, language_1 as [From language], language_2 as [To language], 
  description as Description, user_id as [Created by] from card_set
  where title like('%%')
  and description like ('%%')
  and language_1 = ('')
  and language_2 = ('');
  
--listing cards in a set
select word, translation from card
where set_id=();

--Updating set (admin)  
update card_set
  set description='', title='', language_1='', language_2=''
  where set_id=();
  
--Updating card (admin)
update card
  set word='', translation=''
  where card_id=();
  
--Deleting set (admin)
delete from card_set
  where set_id=();
  
--Deleting card (admin)
delete from card
  where card_id=();
