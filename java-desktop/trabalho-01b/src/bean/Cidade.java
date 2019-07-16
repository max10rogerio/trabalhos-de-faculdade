package bean;

public class Cidade {
	private int id;
	private String cidade;
	private String uf;
	
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getCidade() {
		return cidade;
	}
	public void setCidade(String cidade) {
		this.cidade = cidade;
	}
	public String getUf() {
		return uf;
	}
	public void setUf(String uf) {
		this.uf = uf;
	}
	public Cidade() {
		
	}
	public Cidade(int id, String cidade, String uf) {
		this.id = id;
		this.cidade = cidade;
		this.uf = uf;
	}
}
