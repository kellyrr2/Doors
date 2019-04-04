
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;

public class Searchbar {

	public ArrayList<Application> applications;

	// search for given name
	public ArrayList<Application> search(String toFind) {
		ArrayList<Application> result = null;
		for (int i = 0; i < applications.size(); i++) {
			if (applications.get(i).getName().contains(toFind)) {
				result.add(applications.get(i));
			}
		}
		return result;
	}

	public ArrayList<Application> filter() {
		// need to define criteria

		// filtered using price<100
		ArrayList<Application> result = null;
		for (int i = 0; i < applications.size(); i++) {
			if (applications.get(i).getPrice() < 100) {
				result.add(applications.get(i));
			}
		}
		return result;
	}

	Comparator<Application> compareByName = (Application a1, Application a2) -> a1.getName().compareTo(a2.getName());

	// sorted on the basis of name
	public void Sort() {
		Collections.sort(applications, compareByName);
	}
}