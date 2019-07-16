/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import java.util.List;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.Configuration;

/**
 *
 * @author Kin
 */
public class CRUD {

    /**
     * @param args the command line arguments
     */
    public static void Cadastrar(Usuarios user) {

        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        session.save(user);
        session.getTransaction().commit();
        session.flush();
        session.close();

    }

    public static void CadastrarPedido(Pedidos pedido) {

        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        session.save(pedido);
        session.getTransaction().commit();
        session.flush();
        session.close();

    }

    public static List Listar() {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();

        Query queryResult = session.createQuery("from Usuarios");
        List todosUsuarios;
        todosUsuarios = queryResult.list();
        for (int i = 0; i < todosUsuarios.size(); i++) {
            Usuarios usuario = (Usuarios) todosUsuarios.get(i);
        }
        session.flush();
        session.close();
        return todosUsuarios;

    }

    public static Usuarios ListarId(int id) {
        Usuarios user = new Usuarios();
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        Query queryResult = session.createQuery("FROM Usuarios WHERE id = :id");
        queryResult.setInteger("id", id);
        user = (Usuarios) queryResult.uniqueResult();
        session.flush();
        session.close();
        return user;

    }

    public static void Deletar(int id) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        Usuarios user = (Usuarios) session.load(Usuarios.class, id);
        session.delete(user);
        session.getTransaction().commit();
        session.flush();
        session.close();
    }

    public static void Update(Usuarios user) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        session.update(user);
        session.getTransaction().commit();
        session.flush();
        session.close();

    }

}
