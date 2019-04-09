import java.util.ArrayList;

public class Application {
	public String name;
	public String description;
	public String developers;
	public String platform;
	public String version;
	public String link;
	public double price;

	public Application(String name, String description, String developers, String platform, String version, String link,
			double price) {
		this.name = name;
		this.description = description;
		this.developers = developers;
		this.platform = platform;
		this.version = version;
		this.link = link;
		this.price = price;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getDescription() {
		return description;
	}

	public void setDescription(String description) {
		this.description = description;
	}

	public String getDevelopers() {
		return developers;
	}

	public void setDevelopers(String developers) {
		this.developers = developers;
	}

	public String getPlatform() {
		return platform;
	}

	public void setPlatform(String platform) {
		this.platform = platform;
	}

	public String getVersion() {
		return version;
	}

	public void setVersion(String version) {
		this.version = version;
	}

	public String getLink() {
		return link;
	}

	public void setLink(String link) {
		this.link = link;
	}

	public double getPrice() {
		return price;
	}

	public void setPrice(double price) {
		this.price = price;
	}

	// implementation
	public ArrayList<String> comments;

	public ArrayList<String> getComments() {
		return comments;
	}

	public void addComment(String comment) {
		comments.add(comment);
	}

	public void removeComment(String comment) {
		comments.remove(comment);
	}
}