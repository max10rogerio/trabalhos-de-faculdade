package crud;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import bean.Cidade;
import connection.Conexao;
public class Crud {
	public static void save(Cidade cidade) {
		Connection conn = Conexao.Conectar();
		String sql = "INSERT INTO cidade(id,cidade,uf) values(?,?,?)";		
		PreparedStatement statement;
		try {
			statement = conn.prepareStatement(sql);
			statement.setInt(1, cidade.getId());
			statement.setString(2, cidade.getCidade());
			statement.setString(3, cidade.getUf());
			statement.executeUpdate();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	public static void update(Cidade cidade) {
		Connection conn = Conexao.Conectar();
		String sql = "UPDATE cidade set cidade=?,uf=? where id=?";
		PreparedStatement statement;
		try {
			statement = conn.prepareStatement(sql);
			statement.setString(1, cidade.getCidade());
			statement.setString(2, cidade.getUf());
			statement.setInt(3, cidade.getId());
			statement.executeUpdate();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	public static void delete(int codigo) {
		Connection conn = Conexao.Conectar();
		String sql = "DELETE FROM cidade where id=?";
		PreparedStatement statement;
		try {
			statement = conn.prepareStatement(sql);
			statement.setInt(1, codigo);
			statement.executeUpdate();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
	public static ArrayList listar(){
		Connection conn = Conexao.Conectar();
		ArrayList<Cidade>cidades= new ArrayList<Cidade>();
		String sql = "SELECT * from cidade";
		PreparedStatement statement;
		try {
			statement = conn.prepareStatement(sql);
			ResultSet result = statement.executeQuery();
			while (result.next()) {
                Cidade cidade = new Cidade(
                        result.getInt("id"),
                        result.getString("cidade"),
                        result.getString("uf"));
                cidades.add(cidade);
            }
		} catch (Exception err) {
			System.out.print(err);
		}
		return cidades;
	}
}
