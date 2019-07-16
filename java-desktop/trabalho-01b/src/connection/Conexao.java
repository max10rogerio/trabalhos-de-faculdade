package connection;

import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Connection;

public class Conexao {
	public static Connection Conectar() {
		Connection conn = null;
		try {
			Class.forName("org.postgresql.Driver");			
		}catch(Exception err) {
			System.out.println(err);
		}
		try {
			String url = "jdbc:postgresql://localhost:5432/postgres?user=postgres&password=postgres";
			conn = DriverManager.getConnection(url);
			System.out.println("Persistência ativada");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return conn;	
	}
}
