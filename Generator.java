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
        String allowedPassword;
	String[] language;
	
	public Generator() {
		user = new Vector < Vector < String > > ();
		cardSet = new Vector < Vector < String > > ();
		card = new Vector < Vector < String > > ();
		
		userDomain = new String[]{"varchar","varchar","char(1)"};
		cardSetDomain = new String[]{"integer","varchar","varchar","varchar","varchar","varchar"};
		cardDomain = new String[]{"integer","varchar","varchar","integer"};
		
		userAttributes = new String[]{"username","pw","isAdmin"};
		cardSetAttributes = new String[]{"NULL","title","description","language_1","language_2","user_id"};
		cardAttributes = new String[]{"NULL","word","translation","set_id"};
		
		userPK = new TreeMap<String, Integer>();
		cardSetPK = new TreeMap<String, Integer>();
		cardPK = new TreeMap<String, Integer>();
		
		rnd = new Random();
                allowedPassword="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		language = new String[]{"Lunarian","Martian","Plutonian","Uranian","Neptunian","Vegeterian"};
	}
	
	public void run() {
		createUser();
		createCardSet();
		//createCard();
	}
		
	/*
        create table users(
        username varchar(20) primary key,
        pw varchar(20) NOT NULL CHECK (LENGTH(pw)>8),
        isAdmin CHAR(1) NOT NULL CHECK (isAdmin = 'Y' OR isAdmin = 'N')
        );
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
			
                        
			user.get(i).set(1, passwordMaker(rnd,8+rnd.nextInt(13))); // password: 8-20 char
			if (adminNum < 3) {				// admin
				user.get(i).set(2, "Y");
				adminNum++;
			}
			else user.get(i).set(2, "N");
		}
		
		fileMaker("users", user, userDomain, userAttributes);
	}
        
	private String passwordMaker(Random rnd, int length){
            char [] tmp = new char[length];
            int aplen=allowedPassword.length();
            for (int i=0;i<length;i++){
                tmp[i]=allowedPassword.charAt(rnd.nextInt(aplen));
            }
            return new String(tmp);
        }
	/*
        create table card_set(
        set_id integer primary key,
        title varchar(50),
        description varchar(200),
        language_1 varchar(20),
        language_2 varchar(20),
        check (language_1 <> language_2),
        user_id varchar(20) references users(username));
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
        create table card(
        card_id integer primary key,
        word varchar(30),
        translation varchar(60),
        set_id integer references card_set(set_id) on delete cascade);
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
			//card.get(i).set(3, cardSet.get(rnd.nextInt(cardSetNumber)).get(0));
                        card.get(i).set(3, String.valueOf(1+rnd.nextInt(cardSetNumber)));
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
						if (domain[i].toLowerCase().equals("varchar") || domain[i].toLowerCase().equals("char(1)")) out.write("'");
						out.write(a.get(i));
						if (domain[i].toLowerCase().equals("varchar") || domain[i].toLowerCase().equals("char(1)")) out.write("'");
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
                System.out.println("Done!");
	}
} 
