import java.util.*;
import java.io.*;

class Generator {
	int userNumber = 20;
	int cardSetNumber = 40;
	int cardNumber = 1000;
	
	Vector < Vector < String > > user;
	Vector < Vector < String > > cardSet;
	Vector < Vector < String > >  card;
	
	String[] userDomain;
	String[] cardSetDomain;
	String[] cardDomain;
	
	String[] userAttributes;
	String[] cardSetAttributes;
	String[] cardAttributes;
	
	TreeMap<String, Integer> userPK;
	TreeMap<String, Integer> cardSetPK;
	TreeMap<String, Integer> cardPK;
	
	Random rnd;

	String[] language;
	
	public Generator() {
		user = new Vector < Vector < String > > ();
		cardSet = new Vector < Vector < String > > ();
		card = new Vector < Vector < String > > ();
		
		userDomain = new String[]{"varchar","varchar","boolean"};
		cardSetDomain = new String[]{"integer","varchar","varchar","varchar","varchar","varchar"};
		cardDomain = new String[]{"integer","varchar","varchar","integer"};
		
		userAttributes = new String[]{"username","password","admin"};
		cardSetAttributes = new String[]{"NULL","title","description","language_1","language_2","user_id"};
		cardAttributes = new String[]{"NULL","word","translation","set_id"};
		
		userPK = new TreeMap<String, Integer>();
		cardSetPK = new TreeMap<String, Integer>();
		cardPK = new TreeMap<String, Integer>();
		
		rnd = new Random();
		
		language = new String[]{"Lunarian","Martian","Plutonian","Uranian","Neptunian","Vegeterian"};
	}
	
	public void run() {
		createUser();
		createCardSet();
		createCard();
	}
		
	/*
 	username varchar(20) primary key, 
 	password varchar(20), 
 	admin boolean); 
	*/
	public void createUser() {
		int adminNum = 0;
		for (int i = 0; i < userNumber; i++) {
			user.add(new Vector < String > ());
			for (int j = 0; j < userAttributes.length; j++) {
				user.get(i).add("");
			}
			
			String temp;
			do {
				temp = wordMaker(rnd.nextInt(5)+5);
			} while (userPK.containsKey(temp)); // uniqueConstraint
			user.get(i).set(0, temp);	// name
			userPK.put(temp, i);
			
			user.get(i).set(1, "12345");	// password
			if (adminNum < 3) {				// admin
				user.get(i).set(2, "TRUE");
				adminNum++;
			}
			else user.get(i).set(2, "FALSE");
		}
		
		fileMaker("user", user, userDomain, userAttributes);
	}
	
	/*
	set_id integer auto_increment primary key, 
 	title varchar(50), 
 	description varchar(200), 
 	language_1 varchar(20), 
 	language_2 varchar(20) 
 	user_id varchar(20) references user(username)); 
	*/
	public void createCardSet() {
		for (int i = 0; i < cardSetNumber; i++) {
			cardSet.add(new Vector < String > ());
			for (int j = 0; j < cardSetAttributes.length; j++) {
				cardSet.get(i).add("");
			}
			
			String temp;
			do {
				temp = String.valueOf(i);
			} while (cardSetPK.containsKey(temp)); // uniqueConstraint
			cardSet.get(i).set(0, temp);	// id
			cardSetPK.put(temp, i);
			
			cardSet.get(i).set(1, wordMaker(rnd.nextInt(5)+5));	// set title
			cardSet.get(i).set(2, wordMaker(rnd.nextInt(30)+10));	// description
			cardSet.get(i).set(3, language[rnd.nextInt(language.length)]);	// language 1
			
			String lang2nd = "";
			do {
				lang2nd = language[rnd.nextInt(language.length)];
			} while (lang2nd == cardSet.get(i).get(3)); // check language_1 != language_2
			cardSet.get(i).set(4, lang2nd);	// language 2
			
			cardSet.get(i).set(5, user.get(rnd.nextInt(userNumber)).get(0));	// user
		}
		
		fileMaker("cardSet", cardSet, cardSetDomain, cardSetAttributes);
	}
	
	/*
	card_id integer auto_increment primary key,
	word varchar(30),
	translation varchar(60),
	foreign key set_id integer references card_set(set_id) on delete cascade);
	 */
	public void createCard() {
		for (int i = 0; i < cardNumber; i++) {
			card.add(new Vector < String > ());
			for (int j = 0; j < cardAttributes.length; j++) {
				card.get(i).add("");
			}
			
			String temp;
			do {
				temp = String.valueOf(i);
			} while (cardPK.containsKey(temp)); // uniqueConstraint
			card.get(i).set(0, temp);	// id
			cardPK.put(temp, i);

			card.get(i).set(1, wordMaker(rnd.nextInt(9)+4));	// set title
			card.get(i).set(2, wordMaker(rnd.nextInt(9)+4));	// description
			card.get(i).set(3, cardSet.get(rnd.nextInt(cardSetNumber)).get(0));
		}
		
		fileMaker("card", card, cardDomain, cardAttributes);
	}
	
	public String wordMaker(int length) {
		String[] consonance = new String[]{"b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z"};
		String[] vowel = new String[]{"a","e","i","o","u"};
		
		String word = "";
		
		word += consonance[rnd.nextInt(21)].toUpperCase();
		int mask = 1;
		for (int i = 1; i < length; i++) {
			if (mask == 0) {
				word += consonance[rnd.nextInt(21)];
				mask = 1;
			}
			else {
				word += vowel[rnd.nextInt(5)];
				mask = 0;
			}
		}
		
		return word;
	}
	
	public void fileMaker(String name, Vector < Vector < String >> data, String[] domain, String[] attributes) {
		/*
		System.out.println(name+".txt");
		for (int i = 0; i < data.size(); i++) {
			for (int j = 0; j < data.get(i).size(); j++) {
				System.out.print(data.get(i).get(j)+" ");
			}
			System.out.println();
		}
		*/
		try {
			File file = new File(".\\"+name+".txt");
			if (!file.exists()) {file.createNewFile();}

			BufferedWriter out = new BufferedWriter ( new FileWriter(file));
			
			boolean[] nullCheck = new boolean[attributes.length];
			String sqlINSERT = "INSERT INTO "+name+" (";
			for (int i = 0; i < attributes.length; i++){
				if (attributes[i].toUpperCase().equals("NULL")) {
					nullCheck[i] = true;
				}
				else {
					sqlINSERT += attributes[i];
					if (i < attributes.length-1) {
						sqlINSERT += ", ";
					}
				}
			}
			sqlINSERT += ") VALUES (";
			
			
			for (Vector < String > a : data) {
				out.write(sqlINSERT);
				
				for (int i = 0; i < a.size(); i++) {
					if (!nullCheck[i]) {
						if (domain[i].toLowerCase().equals("varchar")) out.write("'");
						out.write(a.get(i));
						if (domain[i].toLowerCase().equals("varchar")) out.write("'");
						if (i < a.size()-1) {
							out.write(", ");
						}
					}
				}
				out.write(");");
				out.newLine();
			}

			out.close();
		} catch (IOException e) {
		}
	}
	
	public static void main(String[] args) {
		Generator program = new Generator();
		program.run();
	}
} 
